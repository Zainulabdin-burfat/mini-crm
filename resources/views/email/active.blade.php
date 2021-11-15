<div class="row">
  <div class="col-sm-12">
    <h1 align="center" style="background-color: lightblue; color: blue; padding:25px;">Info</h1>

    <p align="center" style="background-color: lightblue; color: blue; padding:25px; font-size: 25px">
      Company has been Added
    </p>
    <h5>Details</h5>
    <table class="table table-dark">
      <tr>
        <td>Id</td>
        <td>Name</td>
        <td>email</td>
        <td>Website</td>
        <td>logo</td>
      </tr>
      <tr>
        <td><?php echo ($company['id']); ?></td>
        <td><?php echo ($company['name']); ?></td>
        <td><?php echo ($company['email']); ?></td>
        <td><?php echo ($company['website']); ?></td>
        <td><img src="{{ asset($company['logo']) }}" width="30px" height="30px"></td>
      </tr>
      <tr>
      </tr>
    </table>
  </div>
</div>