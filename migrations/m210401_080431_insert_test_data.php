<?php

use yii\db\Migration;

/**
 * Class m210401_080431_insert_test_data
 */
class m210401_080431_insert_test_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("INSERT INTO user (username,password,auth_key,status) VALUES ('ivanov','ivanov','test1key',1);");
        $this->execute("INSERT INTO user (username,password,auth_key,status) VALUES ('petrov','petrov','test2key',1);");
        $this->execute("INSERT INTO user (username,password,auth_key,status) VALUES ('sidorov','sidorov','test3key',1);");
        $this->execute("INSERT INTO user (username,password,auth_key,status) VALUES ('boss','boss','test4key',2);");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DELETE FROM user WHERE username='ivanov';");
        $this->execute("DELETE FROM user WHERE username='petrov';");
        $this->execute("DELETE FROM user WHERE username='sidorov';");
        $this->execute("DELETE FROM user WHERE username='boss';");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210401_080431_insert_test_data cannot be reverted.\n";

        return false;
    }
    */
}
