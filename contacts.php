<?php
  include ('core/init.php');

  //create databse object
  $db = new Database;
  $db->query("select * from contacts");


  //assign result
  $contacts = $db->resultset();

?>
<div class="row">
      <div class="large-12 columns">
        <table>
          <thead>
            <tr>
              <th width="200">Name</th>    
              <th width="130">Phone</th>    
              <th width="200">E-mail</th>    
              <th width="250">Address</th>    
              <th width="100">Group</th>    
              <th width="150">Action</th>    
            </tr>
          </thead>
          <tbody>
          <?php foreach ($contacts as $contact) {
            ?>
            <tr>
              <td><a href="contact.html"><?php echo $contact->first_name." ".$contact->last_name; ?></a></td>
              <td><?php echo $contact->phone; ?></td>
              <td><?php  echo $contact->email; ?></td>
              <td>
                <ul>
                  <li><?php  echo $contact->address1; ?></li>
                  <li><?php if ($contact->address2)  echo $contact->address2; ?></li>
                  <li><?php echo $contact->city.", ".$contact->state." ".$contact->zipcode; ?></li>
                </ul>
              </td>
              <td><?php  echo $contact->contact_group; ?></td>
              <td>
                <div class="button-group small">
                 <a class="button" data-open="editModal<?php echo $contact->id; ?>" data-contact-id="<?php  echo $contact->id; ?>">Edit</a>
                 <form id="deleteContact" action="#" method="POST">
                   <input type="hidden" name="id" value="<?php echo $contact->id;?>">
                   <input type="submit" class="delete-btn button [secondary alert success]" value="Delete">
                 </form>
                </div>
                 <div id="editModal<?php echo $contact->id; ?>" data-cid="<?php echo $contact->id;?>" class="reveal editModal" data-reveal >
                   <h2>Edit Contact</h2>
                    <form id="editContact" action="#" method="POST">
                      <div class="row">
                        <div class="large-6 columns">
                          <label>First Name : 
                          <input type="text" value="<?php echo $contact->first_name;?>" name="first_name" placeholder="Enter First Name">
                          </label>
                        </div>
                        <div class="large-6 columns">
                          <label>Last Name : 
                          <input type="text" value="<?php echo $contact->last_name;?>" name="last_name" placeholder="Enter Last Name">
                          </label>
                        </div>
                      </div>
                      <div class="large-4 columns">
                        <label>Email : 
                        <input type="email" value="<?php echo $contact->email;?>" name="email" placeholder="Enter E-mail Address">
                        </label>
                      </div>
                      <div class="large-4 columns">
                        <label>Contact Group : 
                        <select name="contact_group">
                          <option value="Family" <?php if ($contact->contact_group == 'Family') {
                            echo "selected";
                          };?>>Family</option>
                          <option value="Friends" <?php if ($contact->contact_group == 'Friends') {
                            echo "selected";
                          };?>>Friends</option>
                          <option value="Business" <?php if ($contact->contact_group == 'Business') {
                            echo "selected";
                          };?>>Business</option>
                        </select>
                        </label>
                      </div>
                      <div class="large-4 columns">
                          <label>Phone: 
                            <input type="text" value="<?php echo $contact->phone;?>" name="phone" placeholder="Enter Phone Number">
                          </label>
                        </div>
                      <div class="row">
                        <div class="large-6 columns">
                          <label>Address 1 : 
                            <input type="text" value="<?php echo $contact->address1;?>" name="address1" placeholder="Enter Address 1">
                          </label>
                        </div>
                        <div class="large-6 columns">
                          <label>Address 2 : 
                            <input type="text" value="<?php echo $contact->address2;?>" name="address2" placeholder="Enter Address 2">
                          </label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="large-4 columns">
                          <label>State : 
                            <select name="state">
                              <?php  foreach ($states as $key => $value) {  
                                  if ($key == $contact->state) {
                                    $selected = "selected";
                                  }else{
                                    $selected = " ";
                                  }
                                ?>
                                <option value="<?php echo $key;?>"<?php echo $selected;?>><?php echo $value; ?></option>
                              <?php   } ?>
                            </select>
                          </label>
                        </div>
                        <div class="large-4 columns">
                          <label>City: 
                            <input value="<?php echo $contact->city;?>" name="city" type="text" placeholder="Enter City">
                          </label>
                        </div>
                        <div class="large-4 columns">
                          <label>Zipcode: 
                            <input type="text" value="<?php echo $contact->zipcode;?>" name="zipcode" placeholder="Enter Zipcode">
                          </label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="large-12 columns">
                          <label>Notes : 
                            <textarea name="notes" placeholder="Enter optional Notes"><?php echo $contact->notes;?></textarea>
                          </label>
                        </div>
                      </div>
                      <input type="hidden" name="id" value="<?php echo $contact->id;?>">
                      <input name="submit" type="submit" class="add-btn button small" style="float: right;" value="Submit">
                      <button class="close-button" data-close aria-label="Close modal" type="button">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </form>
                 </div>
              </td>
            </tr>
          <?php   } ?>
          </tbody>
        </table>
      </div>
    </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>