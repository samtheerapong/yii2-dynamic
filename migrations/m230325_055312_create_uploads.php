<?php

use yii\db\Migration;

/**
 * Class m230325_055312_create_uploads
 */
class m230325_055312_create_uploads extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('uploads', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'description' => $this->text(),
            'photo' => $this->string(255),
            'cost' => $this->integer(),
            'price' => $this->integer(),
            'status' => $this->integer(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230325_055312_create_uploads cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230325_055312_create_uploads cannot be reverted.\n";

        return false;
    }
    */
}
