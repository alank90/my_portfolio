### Read Me file
This is my portfolio site. It is a simple static site w/some php to enable visitor to send email to me.

## Web Deployment 
I choose Heroku to deploy my app. If you decide also make sure you have the Heroku CLI [installed on your machine.](https://devcenter.heroku.com/articles/heroku-cli#download-and-install)

For creating/adding a Heroku Remote see [Add a Heroku Remote](https://devcenter.heroku.com/articles/git)

For example here I added the already existing Heroku remote by issuing command `heroku git:remote -a akillian-portfolio`

## Env Variables
We need to setup several environment variables so we don't expose our credentials on Github etc. If you wish to test the mail function locally add these lines to *send_mail.php*:

  `putenv("SENDGRID_USERNAME=sendgrid-username");`

  `putenv("SENDGRID_PASSWORD=sendgrid-password");`

Can alternately use [phpdotenv](https://github.com/vlucas/phpdotenv) to add a **.env** file in the root directory with the appropriate name/value pairs like

`SENDGRID_USERNAME = 'username';`

`SENDGRID_PASSWORD = 'password';`

and use $dotenv

## Composer
This project uses **Composer** to include dependencies. Make sure you have [Composer Installed on Ubuntu](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-18-04) or [in general](https://getcomposer.org/) and then issue the command `composer install`

## Deploying code

To deploy your app to Heroku, you typically use the `git push` command to push the code from your local repository’s *master* branch to your heroku remote, like so:

`git push heroku master`
Initializing repository, done.
updating 'refs/heads/master'
...

Use this same command whenever you want to deploy the latest committed version of your code to Heroku.

> Note that Heroku only deploys code that you **push to the master branch** of the heroku remote. Pushing code to another branch of the remote has no effect.