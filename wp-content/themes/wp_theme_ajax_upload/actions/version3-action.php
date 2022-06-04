<?php
      /*
            Template Name: Version3 Action
      */
      try{
            if(!empty($_POST)){
                  $reCaptcha_v2_sercret_key = "6Lcl4rUUAAAAAFwhfyIeMs3osxFO9ics-WbwFDga";
                  if($_POST["my-form-nonce"] == "" || !wp_verify_nonce($_POST["my-form-nonce"],"my_form_nonce")){
                        //Code Not Safe So Abort
                        echo "Not Safe Operation!";
                        return;
                  }else{
                        if(isset($_POST["email"]) && isset($_POST["first-name"]) && isset($_POST["last-name"]) && isset($_POST["token"])){
                              
                              $email =  $_POST["email"];
                              $first_name = $_POST["first-name"];
                              $last_name =  $_POST["last-name"];
                              $token =  $_POST["token"];
                              $verify_reCaptcha_PHP = false;
                              if((file_exists($_FILES["file-cv"]["tmp_name"]) || is_uploaded_file($_FILES['file-cv']['tmp_name'])) && (file_exists($_FILES["file-cover-letter"]["tmp_name"]) || is_uploaded_file($_FILES['file-cover-letter']['tmp_name']))){
                                    $resumeFileName = $_FILES["file-cv"]["name"];
                                    $resumeFileTmpName = $_FILES["file-cv"]["tmp_name"];
                                    $resumeFileSize = $_FILES["file-cv"]["size"];
                                    $resumeFileError = $_FILES["file-cv"]["error"];
                                    $resumeFileType = $_FILES["file-cv"]["type"];

                                    $coverFileName = $_FILES["file-cover-letter"]["name"];
                                    $coverFileTmpName = $_FILES["file-cover-letter"]["tmp_name"];
                                    $coverFileSize = $_FILES["file-cover-letter"]["size"];
                                    $coverFileError = $_FILES["file-cover-letter"]["error"];
                                    $coverFileType = $_FILES["file-cover-letter"]["type"];

                                    $resumeFileExtension = explode(".", $resumeFileName);
                                    $coverFileExtension = explode(".", $coverFileName);

                                    $resumeFileActualExtension = strtolower(end($resumeFileExtension));
                                    $coverFileActualExtension = strtolower(end($coverFileExtension));

                                    $allowedExtension = array("pdf", "doc", "docx");

                                    if(in_array($resumeFileActualExtension, $allowedExtension) && in_array($coverFileActualExtension, $allowedExtension)){
                                          if($resumeFileError === 0){
                                                if($resumeFileSize <= 25000000 && $coverFileSize <= 25000000){
                                                      $curl_handle = curl_init();
                                                      curl_setopt($curl_handle, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
                                                      curl_setopt($curl_handle, CURLOPT_POST, 1);
                                                      curl_setopt($curl_handle, CURLOPT_POSTFIELDS, "secret=" . $reCaptcha_v2_sercret_key . "&response=" . $token);
                                                      curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION,1);
                                                      curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER,1);
                                                      curl_setopt($curl_handle, CURLOPT_TIMEOUT, 30);
                                                      curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
                                                      curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded"));
                                                      $server_output = curl_exec($curl_handle);
                                                      curl_close($curl_handle);
                                                      //echo $server_output;
                                                      if (empty($server_output)){
                                                          echo "Not Vaild reCaptcha!";
                                                      } else{
                                                            $json = json_decode($server_output);
                                                            $verify_reCaptcha_PHP =  $json->success ? true : false;
                                                            if($verify_reCaptcha_PHP == true){
                                                                  $resumeFileNewName = uniqid($first_name ."-" . $last_name . "-cv-", false) . "." . $resumeFileActualExtension;
                                                                  $coverFileNewName = uniqid($first_name ."-" . $last_name . "-cover-letter-", false) . "." . $coverFileActualExtension;
                                                                  $resumeFileDestintaion = "./hr-uploads/" . $resumeFileNewName;
                                                                  $coverFileDestintaion = "./hr-uploads/" . $coverFileNewName;
                                                                  move_uploaded_file($resumeFileTmpName, $resumeFileDestintaion);
                                                                  move_uploaded_file($coverFileTmpName, $coverFileDestintaion);
                                                                  //header("Location: hubspot-step2?resume-link=http://localhost/jQuery-Ajax-Upload-With-Progressbar/hr-uploads/" . $resumeFileNewName. "&cover-link=http://localhost/jQuery-Ajax-Upload-With-Progressbar/hr-uploads/". $coverFileNewName);
                                                                  echo "<br><a href='http://localhost/jQuery-Ajax-Upload-With-Progressbar/hr-uploads/" . $resumeFileNewName. "' class='d-block' download>C.V.</a><a href='http://localhost/jQuery-Ajax-Upload-With-Progressbar/hr-uploads/". $coverFileNewName . "' class='d-block' download>Cover letter</a><div>" . $first_name . " " . $last_name . "<br>" . $email. "</div>";
                                                            }else{
                                                                  echo "Not Safe reCaptcha Value!";
                                                            }
                                                      }
                                                }else{
                                                      echo "Your file is too big, a maximum of 25MB file is Allowed!";
                                                }
                                          }else{
                                                echo "There was an error uploading your file!";
                                          }
                                    }else{
                                          echo "You cannot upload files of this type!";
                                    }
                              }else{
                                    echo "Please Upload your C.V. and Cover Letter!";
                              }
                        }else{
                              echo "Please Fill The Form Application!";
                        }
                  }
            }else{
                  echo "Not Valid Operation!";
            }
      }catch(Exception $e){
            echo "Form Error!";  
      }
?>