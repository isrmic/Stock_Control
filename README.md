# Stock_Control
A Simple Stock Control with PHP

#Open source projects used
* [Bootstrap](http://getbootstrap.com.br/)
* [FlatUI](http://designmodo.github.io/Flat-UI/)

#Instalação

Execute o arquivo sql "Stock_control.sql".
Nele está configurado para criar a database e as duas tabelas que são usadas, mais abaixo na ultima linha escrita tem o insert do usuário que se quiser você pode modificar o nome de usuário e a senha a ser usada, desde que a senha esteja em MD5 e com letras maiusculas.

configure em seu servidor para ser acessado da seguinte forma :

http://localhost/stock_control/ , é importante ter stock_control seguido do dominio ou ip caso contrário não deve funcionar.

Se manteve o código intacto para fazer login depois de cadastrar é só inserir no campo UserName -> "admincontrol" e Password -> "123456" .

#Instalation

Run the sql file "Stock_control.sql".
It is configured to create a database and two tables that are used, below the last line written have the user insert that if you want you can modify the user name and password to be used, as long as the password is MD5 and uppercase letters.

configure your server to be accessed as follows:

http: // localhost / stock_control / it is important to stock_control followed by domain or IP otherwise should not work.

Remained intact the code to log in after registering just enter the UserName field -> "AdminControl" and Password -> "123456".

#Atualização

Agora pode-se conectar tanto com mysql como também SQL server , basta executar o arquivo "new_stock_control.sql" no managment studio do SQL Server , e alterar no arquivo Database.ini abaixo do comentario no bloco [type] driver para odbc (Driver = 'odbc') caso queira mysql é so colocar (Driver = 'mysql').

#Update

Now you can connect to both MySQL as well as SQL Server, just run the file "new_stock_control.sql" in the studio managment SQL Server, and change the Database.ini file below the comment block in the [type] driver for ODBC (Driver = 'odbc') if you want mysql is only put (Driver = 'mysql').
