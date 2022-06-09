<?php

use yii\db\Migration;
use common\models\User;

/**
 * Class m220511_053555_create_rbac_data
 */
class m220511_053555_create_rbac_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $beAdminPermission = $auth->createPermission('beAdmin');
        $auth->add($beAdminPermission);
        

        $adminRole = $auth->createRole('admin');
        $auth->add($adminRole);

        $auth->addChild($adminRole, $beAdminPermission);

        $user = new User([
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password_hash' => '$2y$13$kO5bWIdJ.FFgVbIni.MpxueXI.GKem.g6sH7WpSkvS1X0R5PYN/mu',
        ]);
        $user->generateAuthKey();
        $user->save();

        $auth->assign($adminRole, $user->getId());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220511_053555_create_rbac_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220511_053555_create_rbac_data cannot be reverted.\n";

        return false;
    }
    */
}
