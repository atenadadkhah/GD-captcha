# GD-captcha
This repository can easily make a captcha image for you and take control of checking its accuracy.
## Used items
- Definitely PHP ;) (PHP >= v7.4)
- GD library
## How to use
1. Add **Captcha.php** and **captcha_add.php** to your directory.
2. include **Captcha.php** to your main file
3. Follow the steps below

According to **demo.php**, we assume you have a form in the page:
```html
<form class="mx-auto" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group ">
                <label for="exampleInputPassword1">Enter the Captcha</label>
                <div class="d-flex">
                    <input type="text" class="form-control mr-2" name="captcha" placeholder="captcha">
                    <img src="captcha_add.php" alt="">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
```
As you see, I put an image tag with **captcha_add.php** src where the image is output.

You can have something like this:

![captcha](https://user-images.githubusercontent.com/91287064/161240788-78efd47c-671d-4a9d-8ab5-0c1e203f2456.png)


### Personalization options
- Image width
- Image height
- String font size (optional)
- String length (optional)
- String font family (optional)

You can set these options in **captcha_add.php** e.g.
```php
$captcha=new Captcha();
$captcha->captchaControl(200,50,null,5,"Sriracha-Regular.ttf");
```
If you don't want to set a parameter leave it with *null* value and let it be the default one.

About font file that is the last parameter, you have two choices.
1. URL (As the default value) e.g. https://fonts.gstatic.com/s/acme/v17/RrQfboBx-C5_bx0.ttf
2. A font file in the current directory 
## Final step
When you want to check the accuracy of the entered value you can use a static method called *checkCaptcha*. e.g.
```php 
<?php

if (isset($_POST['submit'])){
    if (Captcha::checkCaptcha($_POST['captcha'])){
        echo "Correct value";
    }else{
        echo "Wrong value entered!";
    }
}
 ?>
```
## Author

- [Atena Dadkhah](https://github.com/Atenad86/)
