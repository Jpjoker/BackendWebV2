# Laravel Dynamic Website Project

## About

This Laravel dynamic website project aims to create an informative and interactive website with the following features for a chosen context (e.g., small business, sports club, music festival):

## Functional Minimum Requirements

### Login System:

. Users can log in.
. Visitors can create a new account.
. Users may or may not be administrators.
. Only an administrator can promote another user to administrator status or create a new user that is an admin.

### Profile Page:

. Each user has a publicly available profile page.
. Users can edit their own user data.
. Information shown includes:
. Username
. Birthday
. Avatar (uploadable and saved on the webserver)
. Short 'about me' biography

### Latest News:

Admins can add, edit, and delete news items.
Every visitor can view news posts.
News items include:
Title
Cover image
Content
Publishing date

### FAQ Page:

List of questions and answers, grouped by categories.
Admins can add, edit, and delete FAQ categories.
Admins can add, edit, and delete FAQ question and answer pairs.
Every visitor can view the FAQ page(s).

### Contact Page:

Visitors can fill out a contact form.
Submitted forms are sent to the administrators.

# Extra Requirements

Admins can reply to submitted contact forms through the admin panel; replies are emailed to the original sender.
Users can leave comments on news posts.
Users can pose questions that might be added to the FAQ.
Admins can add answers to the posed FAQ questions through the admin panel.
Basic forum: Users can create threads, and other users can leave replies.
Online ordering: A customer can (with or without being logged in) place an order for the products available on the website.

# Technical Requirements

### Views

Mandatory "about" page serving as a README/list of sources.
Use at least 2 layouts (e.g., 'public' website and admin panel).
Use partials where logical.
Implement techniques from exercises, including control structures, XSS protection, CSRF protection, and client-side validation.

### Routes

All routes use controller methods.
All routes use logical middleware.
Group routes where needed.

### Controller

Use several controllers to split logic.
Utilize resource controllers for CRUD operations.

### Models

Use Eloquent models.
Establish relationships, including at least 1 one-to-many and 1 many-to-many.

### Database

Create the database using migration files.
Include seeders for dummy data.

### Authentication

Default functionality for authentication (login, logout, remember me, register, forgot password, change password).
Add 1 default admin with a seeder (Username: admin, Email: admin@ehb.be, Password: Password!321).

### Theming/Styles

Provide default styling for the website.
If design skills are limited, use a framework like Bootstrap and choose a free theme.

### GIT

Use Git with logical commits and commit often.
Add the 'vendor' folder to the .gitignore file.
Include a link to the GitHub repo in the "about" page.

### Submission

Submit a .zip file named bw_firstname_lastname_laravel.zip on Canvas.
The zip file should exclude the 'vendor' folder.
Include the link to the GitHub repo in the "about" page.

##########################################################################

#### My Database

User
/_ voor the email _/
user*id INT Primary KEY auto_increment,
username VARCHAR(30) NOT NULL Unique,
Company VARCHAR(30) NOT NULL UNIQUE,
Email VARCHAR(30) NOT NULL UNIQUE,
Phone INTGER(10) NOT null UNIQUE,
Password VARCHAR(30),
/* hier onder is voor de dashboard _/
Birthday int,
foto-avatar BLOB or VARCHAR(MAX),
Bio TXT,
/_ Extra \_/
created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

/_ User heeft een relatie met Blog One to many _/

Blog
blogid PRIMARY KEY AUTO_INCREMENT,
title VARCHAR(255) NOT NULL,
cover_image VARCHAR(255) NOT NULL,
content TEXT NOT NULL,
publishing_date DATE NOT NULL,

created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

user_id INT NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)

/_ Blog heeft een relatie met Table One to many _/

Comments
id INT PRIMARY KEY AUTO_INCREMENT,
content TEXT NOT NULL,

created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

user_id INT NOT NULL,
news_item_id INT NOT NULL,
FOREIGN KEY (user_ID) REFERENCES users(id),
FOREIGN KEY (news_item_id) REFERENCES news_items(id)

/_ user heeft eem relatie met faq_categories _/
faq_categories
id INT PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(255) NOT NULL

/_ faq_categories heeft een relatie met faq_questions _/
faq_questions
id int PRIMARY KEY AUTO_INCREMENT,
question VARCHAR(255) NOT NULL,
answer TEEXT NOT NULL,

created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

FOREIGN KEY (faq_categories_id) REFERENCES
faq_categories(id),
user_id INT NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
