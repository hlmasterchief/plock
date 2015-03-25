## Convention

### Coding Convention
1. Always use spaces for indent, spaces size = 4  
2. Use *NIX line ending  
3. Controller:
  - Controller action naming: actionType + actionName (ex: postBookmark, getUser, ...)  
  - Comment each block inside action, encourage using commands bus
4. Model:
  - ...
5. View:
  - ...
6. General:
  - Place open bracket symbol ({) same line with function define  
  - Split block with one empty line, **return** counted as a block

### Template (Frontend)
1. Template should be extended from include/main  
2. Split CSS and JS as many as possible  
3. ...

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