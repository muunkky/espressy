<html>
  <?if(isset($email)){echo "Email:".$email."<br />";}?>
  <?if(isset($pin)){echo "PIN:".$pin;}?>
  <form action="<?=base_url('administrator/add_reviewer')?>" method="POST">
    <div class="input-group">
      <label for="reviewer_email">Reviewer Email</label>
      <input type="email" name="reviewer_email" id="reviewer_email"/>
      <label for="password">Password</label>
      <input type="password" name="password"/>
      <input type="submit" value="submit"/>
    </div>
  </form>
</html>