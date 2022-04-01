# GD-captcha
This repository can easily make a captcha image for you and take control of checking its accuracy.
## Used items
- Definitely PHP ;)
- GD library
## How to use
1. Add **Captcha.php** and **captcha_add.php** to your directory.
2. Follow the steps below

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
![chart](captcha.jpeg)
