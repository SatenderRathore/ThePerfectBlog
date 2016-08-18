# ThePerfectBlog


Assignment1:

Create a lightweight blog from scratch using wamp stack.

 

Requirements:

This assignment will cover creating a very simple blog. It will only consist of posts written by the blogger.

There are three types of user of this application.

i. Viewer(only view blog post)

ii. Blogger(can write blog and can see their own posts)

iii. Admin(Verify Blogger and set permissions for blogger, can also delete the posts of blogger, has all the rights)

 

The front-end will contain these pages.

1. Home page for viewer

- It will display all the blogs.

- By clicking on name of the author, viewer will be able to see the information of the blogger on blogger page.

 

2. Blogger page

- It will display the information of an individual blogger which is given by the blogger during signup.

 

3. Login & Signup page for Blogger & Admin.

- Viewer does not need to login.

 

4. Admin page

- Admin will be able to see the list of all the bloggers.

- Admin will set the permission for individual blogger.

- Only the permitted blogger can insert new blog.

 

5. Home page for blogger

- After signin, blogger will be able to see all the blogs written by him in this page.

- Blogger can update the existing blog in this page.

- Blogger can also insert new blog if he has the permission.

 

6. Contact us page

- It will contain one small form in which viewer will give their details to the admin so that admin can contact him.

 

Technologies to be used:

1. Front end design

- HTML5, CSS3, Javascript.

 

2. Backend Programming Language

- PHP.

 

3. Database

- MySQL with Apache server.

References:

 

1. Blog Design

http://materialdesignthemes.com/demo/mdlwp/

 

2. http://www.w3schools.com/

 

3. you can use any IDE in which you are comfortable.






1. blogger_info	
	- blogger_id(auto_increment)(primary)
	- blogger_username
	- blogger_password
	- blogger_creation_date
	- blogger_updated_date

 2. blog_master
	- blog_id(auto_increment)(primary)
	- blogger_id(foreign)
	- blog_title
	- blog_desc
	- blog_category
	- blog_auther
	- blog_is_active
	- creation_date
	- updated_date

3. blog_detail
	- blog_id(foreign)
	- blog_detail_image



Note : Above tables are just for reference, modifications are
       allowed as per requirement.