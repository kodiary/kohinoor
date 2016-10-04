<?php
namespace App\Controller;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
class SearchController extends AppController
{
    public function index()
    {
        if(isset($_GET['keyword']) && $_GET['keyword'])
        $key = $_GET['keyword'];
        else
        $key = ' ';
        $this->set('key',$key);
        $q_country = '';
        $q_pcat = '';
        $q_tcat = '';
        $q_days = '';
        if(isset($_GET['country']) && $_GET['country'])
        {
            $country = $_GET['country'];
            $q_country = ' AND country_id = '.$country;
        }
        $pmodel = TableRegistry::get('Packages');
        //$tmodel = TableRegistry::get('Tours');
        if(isset($_GET['pcat']) && $_GET['pcat'])
        {
            $q_pcat = ' AND cat_id = '.$_GET['pcat'];
        }
        
        if(isset($_GET['days']) && $_GET['days'])
        {
            if($_GET['days'] != '100'){
            $start = $_GET['days'] - 7;
            $end = $_GET['days'];
            $q_days = ' AND days > '.$start.' AND days <= '.$end;
            }
            else
            {
                $q_days = ' AND days > 21';
            }
            
            
        }
        if(isset($_GET['Packages']) || (!isset($_GET['Packages']) AND !isset($_GET['Tours']))){
            //echo '(title LIKE "%'.$key.'%" OR description LIKE "%'.$key.'%")'.$q_country.$q_pcat.$q_days;die();
        $packages = $pmodel->find()->where(['is_tour = 0 AND (title LIKE "%'.$key.'%" OR description LIKE "%'.$key.'%")'.$q_country.$q_pcat.$q_days])->all();
        $this->set('pmodel',$packages);
        }
        else
        $this->set('pmodel',false);
        if(isset($_GET['Tours']) || (!isset($_GET['Packages']) AND !isset($_GET['Tours']))){
            //echo '(title LIKE "%'.$key.'%" OR description LIKE "%'.$key.'%")'.$q_country.$q_pcat.$q_days;die();
        $tours = $pmodel->find()->where(['is_tour = 1 AND (title LIKE "%'.$key.'%" OR description LIKE "%'.$key.'%")'.$q_country.$q_pcat.$q_days])->all();
        $this->set('tmodel',$tours);
        }
        else
        $this->set('tmodel',false);
        
    }
    
}
