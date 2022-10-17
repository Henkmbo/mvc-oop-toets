<?php
class RichestPeople extends Controller {
  // Properties, field
  private $richestPersonModel;

  // Dit is de constructor
  public function __construct() {
    $this->richestPersonModel = $this->model('RichestPerson');
  }

  public function index() {
    $richestPeople = $this->richestPersonModel->getRichestPeople();

    $rows = '';
    foreach ($richestPeople as $value){
      $rows .= "<tr>
                  <td>$value->Id</td>
                  <td>$value->Name</td>
                  <td>$value->Nettoworth</td>
                  <td>$value->Age</td>
                  <td>$value->Company</td>
                  <td><a href='" . URLROOT . "/richestpeople/delete/$value->Id'>delete</a></td>
                </tr>";
    }


    $data = [
      'title' => '<h1>Rijkste mensen</h1>',
      'richestpeople' => $rows
    ];
    $this->view('richestpeople/index', $data);
  }

  public function delete($Id) {
    $this->richestPersonModel->deleteRichestPerson($Id);

    $data =[
      'deleteStatus' => "Het record met id = $Id is verwijderd"
    ];
    $this->view("richestpeople/delete", $data);
    header("Refresh:3; url=" . URLROOT . "/richestpeople/index");
  }
}

?>