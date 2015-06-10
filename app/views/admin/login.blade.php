<!DOCTYPE html>
<html>
  
<head>
  <title>BuzzFeed Admin Panel</title>
    <meta charset="utf-8">
    <link href="{{ asset('bucketadmin/css/loginstyle.css')}}" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--webfonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <!--//webfonts-->
</head>
<body>
  
         <!-----start-main---->
        <div class="login-form">
            <h1>Admin Login</h1>
            
        <form action="{{URL::route('adminLoginpost')}}" method="post">
          <li>
            <input type="text" class="text" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" ><a href="#" class=" icon user"></a>
          </li>
          <li>
            <input type="password" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><a href="#" class=" icon lock"></a>
          </li>
          
           <div class ="forgot">
            
            <input type="submit" value="Sign In" > <a href="#" class=" icon arrow"></a>                                                                                                                                                                                                                                 </h4>
          </div>
        </form>
      </div>
    
</body>
</html>