<?php




                                if ($emailErr == "") {
                                    echo "<p>Email: " . $email . "</p>";
                                }
                                if ($mobErr == "") {
                                    echo "<p>Mobile no: " . $mob . "</p>";
                                }
                                if ($ageErr == "") {
                                    echo "<p>Age: " . $age . "</p>";
                                }
                                if ($genderErr == "") {
                                    echo "<p>Gender: " . $gender . "</p>";
                                }
                                if ($stateErr == "") {
                                    echo "<p>State: " . $state . "</p>";
                                }
                                if ($skillErr == "") {
                                    echo "<p>Skills:" . implode(', ', $skill) . "</p>";
                                }
                                if ($profilePhotoErr == '') {
                                    foreach ($_FILES["profilePhoto"] as $k => $v) {
                                        echo $k . "=>" . $v . '<br />';
                                    }
                                }
                                if ($resumeErr == '') {
                                    foreach ($_FILES["resume"] as $k => $v) {
                                        echo $k . "=>" . $v . '<br />';
                                    }
                                }
                            }
                                ?> -->