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
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group ">
                <label for="exampleInputPassword1">Enter the Captcha</label>
                <div class="d-flex">
                    <input type="text" class="form-control mr-2" name="captcha" placeholder="captcha">
                    <img src="captcha_add.php" alt="">
                </div>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
```
