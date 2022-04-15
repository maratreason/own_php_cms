<?php

namespace Admin\Model\Setting;

use Engine\Model;

class SettingRepository extends Model
{
    public function getSettings()
    {
        $sql = $this->queryBuilder->select()
            ->from('setting')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }

    public function getSettingData($id)
    {
        $post = new Setting($id);

        return $post->findOne();
    }

    // public function createSetting($params)
    // {
    //     $post = new Setting();
    //     $post->setName($params['name']);
    //     $post->setValue($params['value']);
    //     $postId = $post->save();

    //     return $postId;
    // }

    // public function updatePost($params)
    // {
    //     if (isset($params['post_id'])) {
    //         $post = new Setting();
    //         $post->setName($params['name']);
    //         $post->setValue($params['value']);
    //         $post->save();
    //     }
    // }
}
