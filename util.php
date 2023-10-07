<?php
class Utils{
    // method to sanitize all data
    public function testInput($data){
        $data = trim( $data);
        $data = stripcslashes( $data);
        $data = htmlspecialchars( $data);
        $data = strip_tags( $data);
        return  $data;
    }
    // method for dynamic error and success and error
    public function showMessage($type,$message){
        return '<div class="alert alert-' .$type.'  alert-dismissible fade show" role="alert">
        <strong>'.$message.'</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}