create database takalo_app;
create user 'takalo_service'@localhost identified by 'takalo_password';
grant all privileges on takalo_app.* to 'takalo_service'@localhost identified by 'takalo_password';
