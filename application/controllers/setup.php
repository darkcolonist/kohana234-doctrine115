<?php defined('SYSPATH') or die('No direct script access.');

class Setup_Controller extends Controller {

  public function index()
  {
    if($this->input->post("generate")) {
      // drop unnecessary auto-generated tables
      $statement = "DROP TABLE IF EXISTS `doctrine_lock_tracking`;";
      Doctrine_Manager::connection()->execute($statement);

      $path = APPPATH.'models/doctrine';

      Doctrine::generateModelsFromDb($path,array(
        /**
         * specify the connection name in which doctrine will generate the models for
         */
        Doctrine_Manager::connection()->getName()
      ));

      Session::instance()->set("message", "process completed: connection ".
        Doctrine_Manager::connection()->getName());

      url::redirect(url::current(true));
    }

    $session_message = Session::instance()->get_once("message");

    $view = $session_message ? "<p><strong>".$session_message."</strong></p>" : null;
    $view .= "<form action=\"".url::current(true)."\" method=\"post\">";
    $view .= "<input type=\"submit\" name=\"generate\" value=\"click to generate: connection ".Doctrine_Manager::connection()->getName()."\" />";
    $view .= "</form>";

    echo $view;
  }

  public function tables()
  {
    $path = Doctrine::getPath();
 
    $conn = Doctrine_Manager::connection();
    $result = $conn->execute('SHOW TABLES;')->fetchAll();
    $tables_found = null;
   
    foreach ($result as $table)
    {
      $tables_found .= $table[0]."<br />";
    }
 
    $disp = "doctrine loaded from: {$path}";
    $disp .= "<hr />parsing tables... tables found: ";
    $disp .= "<blockquote>{$tables_found}</blockquote>";
 
    echo $disp;
  }
} 
