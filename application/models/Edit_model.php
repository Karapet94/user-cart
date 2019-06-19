<?php
class Edit_model extends CI_Model{
    protected $table = 'u_cart_products';
    protected $user_table = 'u_cart_USERS';

    public function save($id, $fileName = null)
    {
        if ($id) {
            $this->update($id, $fileName, $_POST['title'], $_POST['description']);
            return $id;
        } else {
            return $this->insert($fileName, $_POST['title'], $_POST['description'], $_POST['user_id']);
        }
    }

    protected function update($id, $fileName, $title, $description)
    {
        $this->db->trans_start();

        if (!empty($_POST)) {
            $dbResult = $this->db->select('name')->get($this->table)->row_array();
            $oldFilename = $dbResult['name'];
//                echo UPLOADS_PATH_WRITE . $oldFilename; die();
            unlink(UPLOADS_PATH_WRITE . $oldFilename);
            $this->db->set(['name' => $fileName, 'title' => $title, 'description' => $description])->where('id', $id)->update($this->table);
        }


        $this->db->trans_complete();
    }


    protected function insert($fileName, $title, $description, $user_id)
    {
        $this->db->trans_start();
        $this->db->set('name', $fileName);
        $this->db->set('title', $title);
        $this->db->set('description', $description);
        $this->db->set('user_id', $user_id);
        $this->db->insert($this->table);
        $productItemId = $this->db->insert_id();
        $this->db->trans_complete();
        return $productItemId;
    }

    public function getData($id)
    {
        return $this->db
            ->select($this->table . '.user_id,' . $this->table . '.title, ' . $this->table . '.name, ' . $this->table . '.description')
            ->from($this->table)
            ->where($this->table . '.id', $id)
            ->get()
            ->result_array();
    }
    public function getDataByUserId($id)
    {
        return $this->db
            ->select($this->table . '.id, ' . $this->table . '.title, ' . $this->table . '.name, ' . $this->table . '.description')
            ->from($this->table)
            ->where($this->table . '.user_id', $id)
            ->get()
            ->result_array();
    }
    public function delete($id = 0)
    {
        if($id){
            $dbResult = $this->db->select('name')->where('id',$id)->get($this->table)->row_array();
            $oldFilename = $dbResult['name'];
            unlink(UPLOADS_PATH_WRITE . $oldFilename);
            $this->db->delete($this->table, array('id' => $id));
        }
    }
    public function deleteUser($id){
        if ($id){
            $dbResult = $this->db->select('name')
                ->from($this->table)
                ->where('user_id',$id)
                ->get()
                ->result_array();
            foreach ($dbResult as $result){
                unlink(UPLOADS_PATH_WRITE . $result['name']);
            }
            return $this->db
                ->where('id', $id)
                ->delete($this->user_table);
        }
    }

}