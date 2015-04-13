## Convention

### Coding Convention
1. Always use spaces for indent, spaces size = 4  
2. Use UNIX line ending  
3. Controller:
  - Controller action naming: actionType + actionName (ex: postBookmark, getUser, ...)  
  - Comment each block inside action, encourage using commands bus
  - Must have __construct() method with injection, even for using facades (see AuthenticationController for example)
4. Model:
  - ...
5. View:
  - ...
6. General:
  - Place open bracket symbol ({) same line with function define  
  - Split block with one empty line, **return** counted as a block

### Template (Frontend)
0. In project root folder, run **npm install** for necessary components
1. All templates should be extended from a main template. A template has been made for this purpose: **layout.master**
2. Always puts CSS (SASS/LESS) and JavaScript (CoffeeScript...) inside resources (SASS in assets/sass, LESS in assets/less, JavaScript in js)
3. Theming bootstrap by editing **\_custom-variable.scss** and **\_custom-bootstrap.scss**
4. Put your own import SASS inside **app.scss**
5. Edit **gulpfile.js** to implement more of your own javascript files
6. Run **gulp watch** for development, **gulp --production** for production
7. Do not put anything inside public, except using **gulp**
8. Should have default values for yield and for printing variable in blade templates  

### Database
1. Edit .env.example and rename it to .env
2. ...

### Configuration
1. DO NOT modify any configurations.  
2. ...

### Version Control
1. Always create new branch for new feature.  
2. As rule 1, DO NOT checkout MERGED BRANCH again.  
3. DO NOT modify exist file, especially testing files, if your tasks do not require.  
4. Write commit message as clear as possible.  

### Note
1. USE ELASTICSEARCH WITH MYSQL FOR EASE OF MIND FUCK YOU