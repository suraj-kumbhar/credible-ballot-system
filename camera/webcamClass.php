<?php

session_start();

require_once( dirname( __FILE__ ) . '/connectionClass.php' );

class webcamClass extends connectionClass {

    private $imageFolder="../images/users/";
    
    // This function will create a new name for every image captured using the current data and time.
    private function getNameWithPath() {
        $voter_id = $_SESSION['voter_id'];

        $name = $this->imageFolder.(string)$voter_id.".jpg";

        /*$name = $this->imageFolder.date('YmdHis').".jpg";*/
        return $name;
    }
    
    // function will get the image data and save it to the provided path with the name and save it to the database
    public function showImage(){
        $file = file_put_contents( $this->getNameWithPath(), file_get_contents('php://input') );
        if(!$file) {
            return "ERROR: Failed to write data to ".$this->getNameWithPath().", check permissions\n";
        }
        else {
            // this line is for saveing image to database
            $this->saveImageToDatabase($this->getNameWithPath());         
            return $this->getNameWithPath();
        }
        
    }
    
    //function for changing the image to base64
    public function changeImagetoBase64($image){
        $path = $image;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }
    
    public function saveImageToDatabase($imageurl){
        $image=$imageurl;
        //if you want to go for base64 encode than enable this line
//        $image=  $this->changeImagetoBase64($image);          
        if($image) {
            $myID = $_SESSION['member_id'];
            $query = "UPDATE tbmembers SET image='$image' WHERE member_id='$myID'";
            /*$query = "Insert into tbmembers (image) values('$image') where member_id=''";*/

            /*$query = "Insert into snapshot (Image) values('$image')";*/

            $result = $this->query($query);
            if($result) {
                return "Image saved to database";
            }
            else {
                return "Image not saved to database";
            }
        }
    }
    
}