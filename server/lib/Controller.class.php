<?php
abstract class Controller {

  /* Must render something to the screen/stdout */
  abstract function render();

  public function is_post() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }

  public function is_get() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
  }

}
