  <?php
      $page = 'customer';
      include('header.php');
      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $data = $obj->show_cus_id($id);
      }
      if($data->num_rows>0){
        while($row = $data->fetch_object()){
            $id = $row->id;
            $name = $row->name;
            $email = $row->email;
            $mobile = $row->mobile;
            $division = $row->div_name;
            $district = $row->dis_name;
            $address = $row->address;

        }
      }
  ?>
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4><i data-feather="user"></i> Customer Details</h4>
                  </div>
                  <div class="card-body">
                    <table class="table">
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col"><?php if(isset($name)){echo $name;}?></th>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <th><?php if(isset($email)){echo $email;}?></th>
                        </tr>
                        <tr>
                          <th>Mobile</th>
                          <th><?php if(isset($mobile)){echo $mobile;}?></th>
                        </tr>
                        <tr>
                          <th>Division</th>
                          <th><?php if(isset($division)){echo $division;}?></th>
                        </tr>
                        <tr>
                          <th>District</th>
                          <th><?php if(isset($district)){echo $district;}?></th>
                        </tr>
                        <tr>
                          <th>Address</th>
                          <th><?php if(isset($address)){echo $address;}?></th>
                        </tr>
                        <tr>
                          <th>Action</th>
                          <th class="cus_delete"><a onclick="javascript: return confirm('Are You Sure You To Delete This Data?');" data-toggle="tooltip" data-placement="top" title="Delete" href="cus_delete.php?id=<?php echo $id;?>"><i class="fas fa-trash-alt"></i</a></th>
                        </tr>
                    </table>
                  </div>
                </div>
              </div>
           </div>
        </section>
    </div>
    
<?php
  // id="swal-6"
  include('footer.php');
?>