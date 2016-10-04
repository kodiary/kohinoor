<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class AdminController extends AppController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('blank');
    } 
    public function index()
    {
        if($this->request->session()->read('id'))
        $this->redirect('/dashboard');
        else
        $this->redirect('/admin/login');
    }
    public function login()
    {   
        $user = TableRegistry::get('Admin');
        if($this->request->session()->read('id'))
        $this->redirect('/dashboard');
        if(isset($_POST['submit']))
        {
            $arr['username'] = $_POST['username'];
            $arr['password'] = $_POST['password'];
            $q = $user->find()
            ->where(['username' =>$arr['username']])
            ->orWhere(['email' =>$arr['username']])
            ->andWhere(['password'=>$arr['password']])
            ->first();
            if($q)
            $this->request->session()->write('id',$q->id);
            else
            $this->Flash->error('login detail invalid');
            $this->redirect('/admin');
            
        }
    }
    public function logout()
    {
        $this->request->session()->destroy();
        $this->redirect('/admin');
    }
    public function forgetpassword()
    {
       $user = TableRegistry::get('Admin');
       $email1 = $_POST['email'];
       $query = $user->find()->where(['email' => $email1])->first();
        $password=$query->password;
        $message="Hello ".$query->username.'<br /> your password is:'.$password; 
        if($email1==$query->email)
        {   
            $email = new Email('default');
                $email->from(['info@kodiary.com' => 'travel'])
                ->emailFormat('both')
                ->to($email1)
                ->subject('Password recovery')
                ->send($message);
            $this->Flash->success('password has been send to ur email');
           return $this->redirect('/admin/login');
        } 
        else{
            $this->Flash->error('email is not register');
            return $this->redirect('/admin/login');
        }
       
    }
    
}
?>