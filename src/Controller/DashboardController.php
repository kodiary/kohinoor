<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

class DashboardController extends AppController
{

    
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('admin');
        if(!$this->request->session()->read('id'))
        $this->redirect('/admin/login');
    } 
    public function index()
    {
        $this->redirect('/dashboard/pages');
    }
    
    /* function related to page manager*/
    public function pages()
    { 
        $this->loadModel('Pages');
        $this->loadModel('PageCategory');
        $this->set('cat',$this->PageCategory);    
            $q = $this->Pages->find()->order('cat_id')->all();
            if($q)
            $this->set('model', $q);
            
    }
    public function editPage($id)
    {
        $this->loadModel('Pages');
        $this->loadModel('PageCategory');
        $this->loadModel('Tags');
        $this->loadModel('PackageCategory');
        //$this->loadModel('TourCategory');
        $packid = $this->PackageCategory->find()->all();
        $this->set('package', $packid);
        //$tourid = $this->TourCategory->find()->all();
        //$this->set('tour', $tourid);
        $tagid = $this->Tags->find()->where(['page_id'=>$id])->all();
        $this->set('tag', $tagid);
        $this->set('cat',$this->PageCategory);
        if($id)   { 
        $q = $this->Pages->find()->where(['id'=>$id])->first();
            if($q)
            $this->set('model', $q);
            }
            
    }
    
    public function savePage($id)
    {
        $ptable = TableRegistry::get('Pages');
        if(!$id)
        $page = $ptable->newEntity();
        else
        {
            $page = $ptable->get($id);
        }
        if(isset($_POST['tags']) && $_POST['tags'])
        {
            foreach($_POST['tags'] as $post)
            {
                if($post[0] == 'p')
                {
                    $package[] = str_replace('p','',$post);
                }
                else
                {
                    $tour[] = str_replace('t','',$post);
                }
            }
            unset($_POST['tags']);
        }
        foreach($_POST as $k=>$p)
        {
            $page->$k = $p;
        }
        //$page = $_POST;
        //$page->body = 'This is the body of the article';
        if($id==0)
        {
            $page->slug = $this->generateSlug($page->title,'Pages');
        }
        if ($ptable->save($page)) {
            
            $this->loadModel('Tags');
            $this->Tags->deleteAll(['page_id'=>$page->id]);
            
            if(isset($package) && count($package))
            {
            foreach($package as $p){    
                $ttable = TableRegistry::get('Tags');
                $ent =  $ttable->newEntity();
                $ent->package_id = $p;
                $ent->page_id = $page->id;
                $ttable->save($ent);
                unset($ttable);
                unset($ent);
            }
            
            }
            if(isset($tour) && count($tour))
            {
            foreach($tour as $p){    
                $ttable = TableRegistry::get('Tags');
                $ent =  $ttable->newEntity();
                $ent->tour_id = $p;
                $ent->page_id = $page->id;
                $ttable->save($ent);
                unset($ttable);
                unset($ent);
            }
            }
            
            $this->Flash->success("Page saved successfully");
           $this->redirect('/dashboard/pages');
        }
        else
        {
            $this->Flash->error("There was problem saving page");
           $this->redirect('/dashboard/editPage/'.$id);
        }
        
            
    }
    
    public function deletePage($id)
    {
        $this->loadModel('Pages');
        $entity = $this->Pages->get($id);
        $result = $this->Pages->delete($entity);
        $this->Flash->success("Page deleted successfully");
        $this->redirect('/dashboard/pages');
    }
    /* functions related to page manager ends */
    
    /* functions related to tour category manager */
    public function packCat()
    {
        
        $this->loadModel('PackageCategory');
           
            $q = $this->PackageCategory->find()->all();
            if($q)
            $this->set('model', $q);
            
    }
    public function editpackCat($id)
    {
        $this->loadModel('PackageCategory');
        if($id)   { 
        $q = $this->PackageCategory->find()->where(['id'=>$id])->first();
            if($q)
            $this->set('model', $q);
            }
            
    }
    
    public function savepackCat($id)
    {
        $ptable = TableRegistry::get('PackageCategory');
        if(!$id)
        $pc = $ptable->newEntity();
        else
        {
            $pc = $ptable->get($id);
        }
        foreach($_POST as $k=>$p)
        {
            $pc->$k = $p;
        }
        //$page = $_POST;
        //$page->body = 'This is the body of the article';
        if($id==0)
        {
            $pc->slug = $this->generateSlug($pc->title,'PackageCategory');
        }
        if ($ptable->save($pc)) {
            $this->Flash->success("Package Category saved successfully");
           $this->redirect('/dashboard/packCat');
        }
        else
        {
            $this->Flash->error("There was problem saving Package Category");
           $this->redirect('/dashboard/editpackCat/'.$id);
        }
        
            
    }
    
    public function deletepackCat($id)
    {
        $this->loadModel('PackageCategory');
        $entity = $this->PackageCategory->get($id);
        $result = $this->PackageCategory->delete($entity);
        $this->Flash->success("Package Category deleted successfully");
        $this->redirect('/dashboard/packCat');
    }
    /* functions related to package caegory manager ends*/
    
    /* function related to package manager*/
    public function packages()
    { 
        $this->loadModel('Packages');
        $this->loadModel('PackageCategory');
        $this->set('cat',$this->PackageCategory);   
        if(isset($_GET['is_tour']))
        {
          $q = $this->Packages->find()->where(['is_tour'=>1])->order('cat_id')->all();  
          
                           
        } 
        else 
        $q = $this->Packages->find()->order('cat_id')->all();
        if($q)
        $this->set('model', $q);
            
    }
    public function editPackage($id)
    {
        $this->loadModel('Packages');
        $this->loadModel('PackageCategory');
        $this->loadModel('Iteniery');
        $this->loadModel('PackageImg');
        $img = $this->PackageImg->find()->where(['package_id'=>$id]);
        $img_count = $this->PackageImg->find()->where(['package_id'=>$id])->count();
        $this->set('imgs',$img);
        $this->set('img_count',$img_count);
        $this->set('cat',$this->PackageCategory);
        if($id)   { 
        $q = $this->Packages->find()->where(['id'=>$id])->first();
        $w = $this->Iteniery->find()->where(['pid'=>$id]);
            if($q)
            $this->set('model', $q);
            if($w)
            $this->set('model1', $w);
            }
            
    }
    
    public function savePackage($id)
    {   $day=1;
        $i=0;        
        $ptable = TableRegistry::get('Packages');
        //$ptable->find()->where(['id'=>$id])->first();
        //$a=$_POST['field_name'];
        //var_dump($_POST);die();
        if(!$id)
        $package = $ptable->newEntity();
        else
        {
            $package = $ptable->get($id);
            
        }
        //var_dump($_POST);die();
        foreach($_POST as $k=>$p)
        {
            
            if($k=='x' || $k=='y' || $k=='w' || $k=='h' || $k=='crop_value' || $k=='image' || $k=='cap')
            {
                foreach($_POST[$k] as $k1=>$p1){
                $dimension[$k][$k1] = $p1;
                }
            }
            elseif ($k=='iteniery')
            {
                $ite = array();
                foreach($p as $key=>$v)
                {
                        $ite[$k][] = $v; 
                 
                }
               // var_dump($ite);die();
                $iten[$k]['title'] =$ite[$k][0];
                //var_dump($iten);die();
                $iten[$k]['description'] =$ite[$k][1];
                unset($ite); 
                $j=0;
                $l=0;
                $m=0;
                foreach($iten as $iten_i)
                {
                    foreach($iten_i as $k=>$iteni)
                    if($k == 'title'){
                        foreach($iteni as $itenie)
                        {
                            if($l==0){
                                
                            $l=$j;
                            }
                            $ite_final[$l]['day'] = $l+1;
                            $ite_final[$l]['pid'] = $package->id;
                            $ite_final[$l]['title'] =$itenie;
                            $l++;
                        }
                    }
                    else
                    {
                        foreach($iteni as $itenie)
                        {
                            if($m==0)
                            $m=$j;
                            $ite_final[$m]['description'] =$itenie;
                            $m++;
                        }
                    }
                }
                
                
            }
            else{
            $package->$k = $p;
            
            }
            
        }
        
        if(isset($_FILES['route_map']['name']) && $_FILES['route_map']['name'])
        {
            
            $route = $_FILES['route_map']['name'];
            $route_arr = explode('.',$route);
            $ext = end($route_arr);
            $route_name = rand(0,999999).'_'.rand(0,999999).'.'.$ext;
            if(move_uploaded_file($_FILES['route_map']['tmp_name'],APP.'../webroot/img/package/final/'.$route_name))
            $package->route_map = $route_name;
            
        }
        //var_dump($package);die();
        
        
        //var_dump($package);die('2222');
        //$page = $_POST;
        //$page->body = 'This is the body of the article';
        if($id==0)
        {
            $package->slug = $this->generateSlug($package->title,'Packages');
        }
        if(isset($dimension['image'][0]))
        {
            $package->image = $dimension['image'][0];
        }
        if ($ptable->save($package)) {
            
            if(isset($dimension) && count($dimension))
            {
                //var_dump($dimension);die();
                $this->loadModel('PackageImg');
                $this->PackageImg->deleteAll(['package_id'=>$package->id]);
                $count = count($dimension['image']);
                for($i=0;$i<$count;$i++)
                {
                    if($dimension['x'][$i]!='' ||$dimension['y'][$i]!='' ||$dimension['w'][$i]!='' ||$dimension['h'][$i]!=''){
                $this->loadComponent('SimpleImage');
                
                $this->SimpleImage->loader(APP.'../webroot/img/package/resized/'.$dimension['image'][$i]);
                $this->SimpleImage->crop($dimension['x'][$i],$dimension['y'][$i],$dimension['w'][$i],$dimension['h'][$i])->save(APP.'../webroot/img/package/final/'.$dimension['image'][$i]);
                unset($this->SimpleImage);
                }
                if($dimension['image'][$i]){
                $pimage = TableRegistry::get('PackageImg');
                    $pack_img = $pimage->newEntity();
                    $pack_img->package_id = $package->id;
                    $pack_img->image =$dimension['image'][$i];   
                    $pack_img->caption =$dimension['cap'][$i];           
                    $pimage->save($pack_img);
                    unset($pimage);
                    unset($pack_img);
                    }
                }
            }
            
            $this->loadModel('Iteniery');
            $this->Iteniery->deleteAll(['pid'=>$package->id]);
            //var_dump($ite_final);die();
            foreach($ite_final as $k=>$days)
            {
                $ittable = TableRegistry::get('Iteniery');
                $iteniery = $ittable->newEntity();
                $iteniery->pid = $package->id;
                $iteniery->day = $k+1;
                $iteniery->title =  $days['title'];
                $iteniery->description =  $days['description'];                
                $ittable->save($iteniery);
                unset($ittable);
                unset($iteniery);
                
            }
            $pid = $package->id;
            unset($package);
            $package = $ptable->get($pid);
            $package->days = $k+1;
            if(isset($_POST['is_tour']))
            {
               $this->Flash->success("Tour saved successfully");
               $this->redirect('/dashboard/packages?is_tour=1'); 
             }
            else{
            $this->Flash->success("Package saved successfully");
           $this->redirect('/dashboard/packages');
           }
            $this->Flash->success("Package saved successfully");
           $this->redirect('/dashboard/packages');
        }else{
            if(isset($_POST['is_tour']))
            {
               $this->Flash->success("There was problem saving Tour");
               $this->redirect('/dashboard/editPackage/'.$id.'?is_tour=1'); 
            }
            else{
            $this->Flash->error("There was problem saving Package");
           $this->redirect('/dashboard/editPackage/'.$id);
           }  
           }  
        
        
            
    }
    
    public function fileUpload()
    {
        //var_dump($_GET);die();
        if(isset($_GET['type']))
        $a=$_GET['type'];
        $this->loadComponent('SimpleImage');
        if($a=='tour')
        {
            if(isset($_FILES['myfile']['name']))
            {
                $name = $_FILES['myfile']['name'];
                if($name)
                {
                    $arr_name = explode('.',$name);
                    $ext = end($arr_name);
                    $name = 'img'.rand(1,1000).'_'.date('Y_m_d_H_i_s').'.'.$ext;
                    move_uploaded_file($_FILES['myfile']['tmp_name'],APP.'../webroot/img/'.$a.'/tmp/'.$name);
                    $this->SimpleImage->loader(APP.'../webroot/img/'.$a.'/tmp/'.$name);
                    $status = $this->SimpleImage->fit_to_width(785)->save(APP.'../webroot/img/'.$a.'/resized/'.$name);
                    die($name);
                }
                else
                {
                    echo "error";die();
                }
            }
        }
        else{
            if(isset($_FILES['myfile']['name']))
            {
                $name = $_FILES['myfile']['name'];
                if($name)
                {
                    $arr_name = explode('.',$name);
                    $ext = end($arr_name);
                    $name = 'img'.rand(1,1000).'_'.date('Y_m_d_H_i_s').'.'.$ext;
                    move_uploaded_file($_FILES['myfile']['tmp_name'],APP.'../webroot/img/package/tmp/'.$name);
                    $this->SimpleImage->loader(APP.'../webroot/img/package/tmp/'.$name);
                    $status = $this->SimpleImage->fit_to_width(785)->save(APP.'../webroot/img/package/resized/'.$name);
                    die($name);
                }
                else
                {
                    echo "error";die();
                }
            }
       } 
    }
    
    public function deletePackage($id)
    {
        $this->loadModel('Packages');
        $entity = $this->Packages->get($id);
        $result = $this->Packages->delete($entity);
        $this->Flash->success("Package deleted successfully");
        $this->redirect('/dashboard/packages');
    }
    /* functions related to package manager ends */
    
    public function settings()
    {
      if(isset($_POST['submit']))  
      {
        $user = TableRegistry::get('Admin');
        $id = $this->request->session()->read('id');
        $query = $user->find()->where(['id' => $id])->first();
        if($_POST['old_password']==$query->password)
        {   
            if(isset($_POST['password'])&& $_POST['password']=='' ){
                $this->Flash->error(' Password cannot be blank');
            }
            else{
                $query = $user->query();
                $query->update()
                ->set(['password' => $_POST['password']])
                ->where(['id' => $id])
                ->execute();
            $this->Flash->success('Password Change successfull.');
            }
                
        }
        else
        {
            $this->Flash->error('Old Password didnot Match.');
        }
        
      }
    }
     public function changeemail(){
        $user = TableRegistry::get('Admin');
        $id = $this->request->session()->read('id');
        $query = $user->find()->where(['id' => $id])->first();
        $this->set('email', $query->email);
        if(isset($_POST['email'])){
          if(isset($_POST['email']) && $_POST['email']=='' ){
            $this->Flash->error('email cannot be blank');
        }
        else{
            $query = $user->query();
                $query->update()
                ->set(['email' => $_POST['email']])
                ->where(['id' => $id])
                ->execute();
                $this->Flash->success('Email change successfull.');
                $this->redirect('/dashboard');
        }  
        }
        
        
        
     }
    public function tourCat()
    {
        
        $this->loadModel('TourCategory');
           
            $q = $this->TourCategory->find()->all();
            if($q)
            $this->set('model', $q);
            
            
    } 
    
            
    
    public function savetourCat($id)
    {
        $ttable = TableRegistry::get('TourCategory');
        if(!$id)
        $tc = $ttable->newEntity();
        else
        {
            $tc = $ttable->get($id);
        }
        foreach($_POST as $k=>$p)
        {
            $tc->$k = $p;
        }
        //$page = $_POST;
        //$page->body = 'This is the body of the article';
        if($id==0)
        {
            $tc->slug = $this->generateSlug($tc->title,'TourCategory');
        }
        if ($ttable->save($tc)) {
            $this->Flash->success("Tour Category saved successfully");
           $this->redirect('/dashboard/tourCat');
        }
        else
        {
            $this->Flash->error("There was problem saving Package Category");
           $this->redirect('/dashboard/edittourCat/'.$id);
        }
        
            
    } 
    public function edittourCat($id)
    {
        $this->loadModel('TourCategory');
        if($id)   { 
        $q = $this->TourCategory->find()->where(['id'=>$id])->first();
            if($q)
            $this->set('model', $q);
            }
            
    }
    public function deletetourCat($id)
    {
        $this->loadModel('TourCategory');
        $entity = $this->TourCategory->get($id);
        $result = $this->TourCategory->delete($entity);
        $this->Flash->success("Tour deleted successfully");
        $this->redirect('/dashboard/tourCat');
    }
     public function tours()
    { 
        $this->loadModel('Tours');
        $this->loadModel('TourCategory');
        $this->set('cat',$this->TourCategory);    
            $q = $this->Tours->find()->order('cat_id')->all();
            if($q)
            $this->set('model', $q);
            
    }
     public function editTour($id)
    {
        $this->loadModel('Tours');
        $this->loadModel('TourCategory');
        $this->set('cat',$this->TourCategory);
        if($id)   { 
        $q = $this->Tours->find()->where(['id'=>$id])->first();
            if($q)
            $this->set('model', $q);
            }
            
    }
     public function saveTour($id)
    {
        $ttable = TableRegistry::get('Tours');
        if(!$id)
        $tour = $ttable->newEntity();
        else
        {
            $tour = $ttable->get($id);
        }
        //var_dump($_POST); die;
        
        foreach($_POST as $k=>$p)
        {
            if($k=='x' || $k=='y' || $k=='w' || $k=='h')
            {
                $dimension[$k] = $p;
            }
            else{
            $tour->$k = $p;
            }
        }
        if(isset($_FILES['route_map']['name']) && $_FILES['route_map']['name'])
        {
            $route = $_FILES['route_map']['name'];
            $route_arr = explode('.',$route);
            $ext = end($route_arr);
            $route_name = rand(0,999999).'_'.rand(0,999999).'.'.$ext;
            if(move_uploaded_file($_FILES['route_map']['tmp_name'],APP.'../webroot/img/tour/final/'.$route_name))
            $tour->route_map = $route_name;
            
        }
        //var_dump($dimension);die();
        if($tour->image){
        $this->loadComponent('SimpleImage');
        $this->SimpleImage->loader(APP.'../webroot/img/tour/resized/'.$tour->image);
        $this->SimpleImage->crop($dimension['x'],$dimension['y'],$dimension['w'],$dimension['h'])->save(APP.'../webroot/img/tour/final/'.$tour->image);
        unlink(APP.'../webroot/img/tour/tmp/'.$tour->image);
        //unlink(APP.'../webroot/img/package/resized/'.$package->image);
        }
        //$page = $_POST;
        //$page->body = 'This is the body of the article';
        if($id==0)
        {
            $tour->slug = $this->generateSlug($tour->title,'Tours');
        }
        if ($ttable->save($tour)) {
            $this->Flash->success("Tour saved successfully");
           $this->redirect('/dashboard/tours');
        }
        else
        {
            $this->Flash->error("There was problem saving Tour");
           $this->redirect('/dashboard/editTour/'.$id);
        }
        
            
    }
    public function deleteTour($id)
    {
        $this->loadModel('Tours');
        $entity = $this->Tours->get($id);
        $result = $this->Tours->delete($entity);
        $this->Flash->success("Package deleted successfully");
        $this->redirect('/dashboard//tours');
    }
    
    public function generateSlug($title,$model)
    {
        $this->loadModel($model);
        $mod = $this->$model->find()->where(['title'=>$title])->first();
        $slug = $title;
        $slug = ereg_replace("[^A-Za-z0-9?!]", "-", $slug);
        $slug = str_replace(' ','-',$slug);
        $slug = str_replace(array('---','--'),array('-','-'),$slug);
        if($mod)
        {
            $slug = $title.'-'.date('YmdHis');
        }
        return $slug;
        
    }
    public function listVideos()
    {
        $this->loadModel('Videos');
        $q = $this->Videos->find()->all();
        if($q)
        $this->set('model', $q);
    }
    public function editVideos($id)
    {
        $this->loadModel('Videos');
        $this->loadModel('PackageCategory');
        $this->loadModel('TourCategory');
        $packid = $this->PackageCategory->find()->all();
        $this->set('package', $packid);
        //$tourid = $this->TourCategory->find()->all();
        //$this->set('tour', $tourid);
        if($id)   { 
        $q = $this->Videos->find()->where(['id'=>$id])->first();
            if($q)
            $this->set('model', $q);
            }
            
    }
    public function savevideos($id)
    {
        $vtable = TableRegistry::get('Videos');
        if(!$id)
        $tc = $vtable->newEntity();
        else
        {
            $tc = $vtable->get($id);
        }
        
        if(isset($_POST['tags']) && $_POST['tags'])
        {
            foreach($_POST['tags'] as $post)
            {
                if($post[0] == 'p')
                {
                    $package[] = str_replace('p','',$post);
                }
                else
                {
                    $tour[] = str_replace('t','',$post);
                }
            }
            unset($_POST['tags']);
        }
        foreach($_POST as $k=>$p)
        {
            $tc->$k = $p;
        }
        //$page = $_POST;
        //$page->body = 'This is the body of the article';
        if ($vtable->save($tc)) {
            $this->loadModel('Tags');
            $this->Tags->deleteAll(['video_id'=>$tc->id]);
            
            if(isset($package) && count($package))
            {
            foreach($package as $p){    
                $ttable = TableRegistry::get('Tags');
                $ent =  $ttable->newEntity();
                $ent->package_id = $p;
                $ent->video_id = $tc->id;
                $ttable->save($ent);
                unset($ttable);
                unset($ent);
            }
            
            }
            if(isset($tour) && count($tour))
            {
            foreach($tour as $p){    
                $ttable = TableRegistry::get('Tags');
                $ent =  $ttable->newEntity();
                $ent->tour_id = $p;
                $ent->video_id = $tc->id;
                $ttable->save($ent);
                unset($ttable);
                unset($ent);
            }
            }
            $this->Flash->success("Video saved successfully");
           $this->redirect('/dashboard/listVideos');
        }
        else
        {
            $this->Flash->error("There was problem saving Video");
           $this->redirect('/dashboard/editVideos/'.$id);
        }
        
            
    }
     public function deletevideos($id)
    {
        $this->loadModel('Videos');
        $entity = $this->Videos->get($id);
        $result = $this->Videos->delete($entity);
        
        $this->loadModel('Tags');
        $this->Tags->deleteAll(['video_id'=>$id]);
        $this->Flash->success("Videos deleted successfully");
        $this->redirect('/dashboard/listVideos');
    } 
    /*Associate Members */
    public function listMembers()
    {
        $this->loadModel('Members');
        $q = $this->Members->find()->all();
        if($q)
        $this->set('model', $q);
    }
    public function editMembers($id)
    {
        $this->loadModel('Members');
       
        if(isset($_FILES['image']['name']) && $_FILES['image']['name'])
        {
            $route = $_FILES['image']['name'];
            $route_arr = explode('.',$route);
            $ext = end($route_arr);
            $route_name = rand(0,999999).'_'.rand(0,999999).'.'.$ext;
            if(move_uploaded_file($_FILES['image']['tmp_name'],APP.'../webroot/img/members/'.$route_name))
            $tc->image = $route_name;
            
        }
        //$tourid = $this->TourCategory->find()->all();
        //$this->set('tour', $tourid);
        if($id)   { 
        $q = $this->Members->find()->where(['id'=>$id])->first();
            if($q)
            $this->set('model', $q);
            }
            
    }
    public function saveMembers($id)
    {
        $vtable = TableRegistry::get('Members');
        if(!$id)
            $tc = $vtable->newEntity();
        else
        {
            $tc = $vtable->get($id);
        }
        if(isset($_FILES['image']['name']) && $_FILES['image']['name'])
        {
            $route = $_FILES['image']['name'];
            $route_arr = explode('.',$route);
            $ext = end($route_arr);
            $route_name = rand(0,999999).'_'.rand(0,999999).'.'.$ext;
            @unlink(APP.'../webroot/img/members/'.$tc->image);
            if(move_uploaded_file($_FILES['image']['tmp_name'],APP.'../webroot/img/members/'.$route_name))
            $tc->image = $route_name;
            
        }
        foreach($_POST as $k=>$p)
        {
            $tc->$k = $p;
        }
        //$page = $_POST;
        //$page->body = 'This is the body of the article';
        if ($vtable->save($tc)) {
           $this->Flash->success("Memebrs saved successfully");
           $this->redirect('/dashboard/listMembers');
        }
        else
        {
            $this->Flash->error("There was problem saving Member");
           $this->redirect('/dashboard/editMembers/'.$id);
        }
        
            
    }
     public function deleteMembers($id)
    {
        $this->loadModel('Members');
        $entity = $this->Members->get($id);
        @unlink(APP.'../webroot/img/members/'.$entity->image);
        $result = $this->Members->delete($entity);
      
        $this->Flash->success("Members deleted successfully");
        $this->redirect('/dashboard/listMembers');
    }
    /*My Team */
    public function listTeam()
    {
        $this->loadModel('Teams');
        $q = $this->Teams->find()->where(['is_testimonial'=>0])->all();
        if($q)
        $this->set('model', $q);
    }
    public function editTeam($id)
    {
        $this->loadModel('Teams');
       
        if(isset($_FILES['image']['name']) && $_FILES['image']['name'])
        {
            $route = $_FILES['image']['name'];
            $route_arr = explode('.',$route);
            $ext = end($route_arr);
            $route_name = rand(0,999999).'_'.rand(0,999999).'.'.$ext;
            if(move_uploaded_file($_FILES['image']['tmp_name'],APP.'../webroot/img/team/'.$route_name))
            $tc->image = $route_name;
            
        }
        //$tourid = $this->TourCategory->find()->all();
        //$this->set('tour', $tourid);
        if($id)   { 
        $q = $this->Teams->find()->where(['id'=>$id])->first();
            if($q)
            $this->set('model', $q);
            }
            
    }
    public function saveTeam($id)
    {
        $vtable = TableRegistry::get('Teams');
        if(!$id)
            $tc = $vtable->newEntity();
        else
        {
            $tc = $vtable->get($id);
        }
        if(isset($_FILES['image']['name']) && $_FILES['image']['name'])
        {
            $route = $_FILES['image']['name'];
            $route_arr = explode('.',$route);
            $ext = end($route_arr);
            $route_name = rand(0,999999).'_'.rand(0,999999).'.'.$ext;
            @unlink(APP.'../webroot/img/team/'.$tc->image);
            if(move_uploaded_file($_FILES['image']['tmp_name'],APP.'../webroot/img/team/'.$route_name))
            $tc->image = $route_name;
            
        }
        foreach($_POST as $k=>$p)
        {
            $tc->$k = $p;
        }
        //$page = $_POST;
        //$page->body = 'This is the body of the article';
        if ($vtable->save($tc)) {
            if($_POST['is_testimonial']==0)
            {
                $this->Flash->success("Team saved successfully");
                $this->redirect('/dashboard/listTeam'); 
            }
            else
            {
                $this->Flash->success("Tesimonial saved successfully");
                $this->redirect('/dashboard/listTestimonial'); 
            }
           
        }
        else
        {
            if($_POST['is_testimonial']==0)
            {
                $this->Flash->error("There was problem saving Team");
                $this->redirect('/dashboard/editTeam/'.$id);
            }
            else
            {
                $this->Flash->error("There was problem saving Tesimonial");
                $this->redirect('/dashboard/editTestimonial/'.$id); 
            }
        }
        
            
    }
     public function deleteteam($id)
    {
        $this->loadModel('Teams');
        $entity = $this->Teams->get($id);
        @unlink(APP.'../webroot/img/team/'.$entity->image);
        $result = $this->Teams->delete($entity);
      
        $this->Flash->success("Team deleted successfully");
        $this->redirect('/dashboard/listTeam');
    }
    /* testimonials */
    public function listTestimonial()
    {
        $this->loadModel('Teams');
        $q = $this->Teams->find()->where(['is_testimonial'=>1])->all();
        
        if($q)
        $this->set('model', $q);
        $this->render('list_team');
    }
    public function editTestimonial($id)
    {
        $this->loadModel('Teams');
       
        if(isset($_FILES['image']['name']) && $_FILES['image']['name'])
        {
            $route = $_FILES['image']['name'];
            $route_arr = explode('.',$route);
            $ext = end($route_arr);
            $route_name = rand(0,999999).'_'.rand(0,999999).'.'.$ext;
            if(move_uploaded_file($_FILES['image']['tmp_name'],APP.'../webroot/img/team/'.$route_name))
            $tc->image = $route_name;
            
        }
        //$tourid = $this->TourCategory->find()->all();
        //$this->set('tour', $tourid);
       
        if($id)   { 
        $q = $this->Teams->find()->where(['id'=>$id])->first();
            if($q)
            $this->set('model', $q);
            }
         $this->render('edit_team');
            
    }
    
    /* sllider manager */
    
    public function sliders()
    { 
        $this->loadModel('Sliders');
        //$this->loadModel('PackageCategory');
        //$this->set('cat',$this->PackageCategory);    
            $q = $this->Sliders->find()->order('id')->all();
            if($q)
            $this->set('model', $q);
            
    }
    public function editSlider($id)
    {
        $this->loadModel('Sliders');
        
        if($id)   { 
        $q = $this->Sliders->find()->where(['id'=>$id])->first();
        
            if($q)
            $this->set('model', $q);
            
            }
            
    }
    
    public function saveSlider($id)
    {   $day=1;
        $i=0;        
        $ptable = TableRegistry::get('Sliders');
        //$ptable->find()->where(['id'=>$id])->first();
        //$a=$_POST['field_name'];
        //var_dump($_POST);die();
        if(!$id)
        $package = $ptable->newEntity();
        else
        {
            $package = $ptable->get($id);
            $img = $package->image;
        }
        
        foreach($_POST as $k=>$p)
        {
            
            
            $package->$k = nl2br($p);
            
            
        }
        if(isset($_FILES['myfile']['name']) && $_FILES['myfile']['name'])
        {
            $route = $_FILES['myfile']['name'];
            $route_arr = explode('.',$route);
            $ext = end($route_arr);
            $route_name = rand(0,999999).'_'.rand(0,999999).'.'.$ext;
            if(move_uploaded_file($_FILES['myfile']['tmp_name'],APP.'../webroot/assets/frontend/pages/img/layerslider/'.$route_name))
            $package->image = $route_name;
            $this->loadComponent('SimpleImage');
            $this->SimpleImage->loader(APP.'../webroot/assets/frontend/pages/img/layerslider/'.$route_name);
            $status = $this->SimpleImage->resize(1500,495)->save(APP.'../webroot/assets/frontend/pages/img/layerslider/'.$route_name);
            
        }
        if ($ptable->save($package)) {
            
            $this->Flash->success("Slider saved successfully");
           $this->redirect('/dashboard/sliders');
        }
        else
        {
            $this->Flash->error("There was problem saving slider");
           $this->redirect('/dashboard/editSlider/'.$id);
        }
        
            
    }
    
    
    
    public function deleteSlider($id)
    {
        $this->loadModel('Sliders');
        $entity = $this->Sliders->get($id);
        $result = $this->Sliders->delete($entity);
        $this->Flash->success("Slider deleted successfully");
        $this->redirect('/dashboard/sliders');
    }
    
    /* blogs*/
    public function blogs()
    { 
        $this->loadModel('Blogs');
        //$this->loadModel('PackageCategory');
        //$this->set('cat',$this->PackageCategory);    
            $q = $this->Blogs->find()->order('id')->all();
            if($q)
            $this->set('model', $q);
            
    }
    public function editBlog($id)
    {
        $this->loadModel('Blogs');
        $this->loadModel('PackageCategory');
        //$this->loadModel('TourCategory');
        $this->loadModel('Tags');
        $packid = $this->PackageCategory->find()->all();
        $this->set('package', $packid);
        //$tourid = $this->TourCategory->find()->all();
        //$this->set('tour', $tourid);
        $tagid = $this->Tags->find()->where(['blog_id'=>$id])->all();
        $this->set('tag', $tagid);
        
        if($id)   { 
        $q = $this->Blogs->find()->where(['id'=>$id])->first();
        
            if($q)
            $this->set('model', $q);
            
            }
            
    }
    
    public function saveBlog($id)
    {   $day=1;
        $i=0;        
        $ptable = TableRegistry::get('Blogs');
        //$ptable->find()->where(['id'=>$id])->first();
        //$a=$_POST['field_name'];
        //var_dump($_POST);die();
        if(!$id)
        $blog = $ptable->newEntity();
        else
        {
            $blog = $ptable->get($id);
            $img = $blog->image;
        }
        if(isset($_POST['tags']) && $_POST['tags'])
        {
            foreach($_POST['tags'] as $post)
            {
                if($post[0] == 'p')
                {
                    $package[] = str_replace('p','',$post);
                }
                
            }
            unset($_POST['tags']);
        }
        
        foreach($_POST as $k=>$p)
        {
            
            
            $blog->$k = $p;
            
            
        }
        if($id==0)
        {
            $blog->slug = $this->generateSlug($blog->title,'Blogs');
        }
        if(isset($_FILES['myfile']['name']) && $_FILES['myfile']['name'])
        {
            $route = $_FILES['myfile']['name'];
            $route_arr = explode('.',$route);
            $ext = end($route_arr);
            $route_name = rand(0,999999).'_'.rand(0,999999).'.'.$ext;
            if(move_uploaded_file($_FILES['myfile']['tmp_name'],APP.'../webroot/img/blogs/'.$route_name))
            $blog->image = $route_name;
            $this->loadComponent('SimpleImage');
            $this->SimpleImage->loader(APP.'../webroot/img/blogs/'.$route_name);
            $status = $this->SimpleImage->fit_to_width(785)->save(APP.'../webroot/img/blogs/'.$route_name);
            
        }
        if ($ptable->save($blog)) {
            $this->loadModel('Tags');
            $this->Tags->deleteAll(['blog_id'=>$blog->id]);
            
            if(isset($package) && count($package))
            {
            foreach($package as $p){    
                $ttable = TableRegistry::get('Tags');
                $ent =  $ttable->newEntity();
                $ent->package_id = $p;
                $ent->blog_id = $blog->id;
                $ttable->save($ent);
                unset($ttable);
                unset($ent);
            }
            
            }
            
            
            $this->Flash->success("Blog saved successfully");
           $this->redirect('/dashboard/blogs');
        }
        else
        {
            $this->Flash->error("There was problem saving blog");
           $this->redirect('/dashboard/editBlog/'.$id);
        }
        
            
    }
    
    
    
    public function deleteBlog($id)
    {
        $this->loadModel('Blogs');
        $entity = $this->Blogs->get($id);
        $result = $this->Blogs->delete($entity);
        $this->Flash->success("Blog deleted successfully");
        $this->redirect('/dashboard/blogs');
    }
    
    public function loadPackSlider()
    {
        $this->set('rand',$_POST['rand']);
        $this->viewBuilder()->layout('blank');
    }

}
