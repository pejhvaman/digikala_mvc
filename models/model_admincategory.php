<?php

class model_admincategory extends Model
{
    public $allChildrenIds = [];

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

    }

    function getCategory()
    {
        $sql = 'select * from tbl_category';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getChildren($idcategory)
    {
        $sql = 'select * from tbl_category WHERE parent=?';
        $prestmt = [$idcategory];
        $result = $this->doSelect($sql, $prestmt);
        return $result;
    }

    function getParents($idcategory)
    {
        $categoryInfo = $this->categoryInfo($idcategory);
        $parent = $categoryInfo['parent'];
        $all_parent = [];
        while ($parent != 0) {
            $sql = 'select * from tbl_category WHERE id=?';
            $parentInfo = $this->doSelect($sql, [$parent], 1);
            array_push($all_parent, $parentInfo);
            $parent = $parentInfo['parent'];
        }
        return $all_parent;
    }

    function categoryInfo($idcategory)
    {
        $sql = 'select * from tbl_category WHERE id=?';
        $categoryInfo = $this->doSelect($sql, [$idcategory], 1);
        return $categoryInfo;
    }

    function addCategory($title, $parent, $edit, $categoryId)
    {
        if ($edit == '') {
            $sql = 'insert into tbl_category (title,parent) VALUE (?,?)';
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1, $title);
            $stmt->bindValue(2, $parent);
            $stmt->execute();
        } else {
            $sql = 'update tbl_category set title=? , parent=? where id=?';
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1, $title);
            $stmt->bindValue(2, $parent);
            $stmt->bindValue(3, $categoryId);
            $stmt->execute();
        }
    }

    function getChilds($catIds)
    {
        $childIds = [];
        foreach ($catIds as $catId) {
            $children = $this->getChildren($catId);
            foreach ($children as $child) {
                array_push($childIds, $child['id']);
            }
        }
        return $childIds;
    }

    function deleteCategory($ids)
    {
        $this->allChildrenIds = array_merge($this->allChildrenIds, $ids);
        while (sizeof($ids) > 0) {
            $childrenIds = $this->getChilds($ids);
            $this->allChildrenIds = array_merge($this->allChildrenIds, $childrenIds);
            $ids = $childrenIds;
        }
        print_r($this->allChildrenIds);

        $allIdsToDelete = join(',', $this->allChildrenIds);
        $sql = 'delete from tbl_category WHERE id IN (' . $allIdsToDelete . ')';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
    }

    function getAttr($categoryId, $attrId)
    {
        $sql = 'select * from tbl_attr WHERE idcategory=? AND parent=? ORDER BY id DESC ';
        $data = [$categoryId, $attrId];
        $result = $this->doSelect($sql, $data);
        return $result;
    }

    function attrInfo($attrId)
    {
        $sql = 'select * from tbl_attr WHERE id=?';
        $result = $this->doSelect($sql, [$attrId], 1);
        return $result;
    }

    function addAttr($data, $cateogryId, $editId)
    {
        if ($editId == '') {
            $sql = 'insert into tbl_attr (title , parent , idcategory) VALUES (?,?,?)';
            $params = [$data['title'], $data['parent'], $cateogryId];
            $this->doQuery($sql, $params);
        } else {
            $sql = 'update tbl_attr set title=? , parent=? WHERE id=?';
            $params = [$data['title'], $data['parent'], $editId];
            $this->doQuery($sql, $params);
        }

    }

    function deleteAttr($ids = [])
    {


        $sql = 'select * from tbl_attr';
        $attrs = $this->doSelect($sql);

        foreach ($attrs as $attr) {
            $parent = $attr['parent'];
            if (in_array($parent, $ids)) {
                array_push($ids, $attr['id']);
            }
        }

        $x = join(',', $ids);
        $sql = 'delete from tbl_attr WHERE id IN (' . $x . ')';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
    }

    function getAttrVal($attrId)
    {
        $sql = "select * from tbl_attr_val WHERE attrId=?";
        $res = $this->doSelect($sql, [$attrId]);
        return $res;
    }

    function saveAttrVal($data, $attrId)
    {
        $attrValNew = $data['attrvalnew'];
        $attrValNew = array_filter($attrValNew);
        foreach ($attrValNew as $val) {
            $sql = "insert into tbl_attr_val (attrId, val) VALUES (?,?)";
            $params = [$attrId, $val];
            $this->doQuery($sql, $params);
        }
        unset($data['attrvalnew']);
        foreach ($data as $key => $val) {
            $key = explode('-', $key);
            if (isset($key[1])) {
                $valId = $key[1];

                if ($val != '') {
                    $sql = "update tbl_attr_val set val=? WHERE id=?";
                    $params = [$val, $valId];
                    $this->doQuery($sql, $params);
                } else {
                    $sql = "delete from tbl_attr_val WHERE id=?";
                    $params = [$valId];
                    $this->doQuery($sql, $params);
                }
            }
        }
    }
}

?>