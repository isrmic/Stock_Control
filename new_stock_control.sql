
/*SCHEMA TO MYSQL*/

create database Stock_control;

use stock_control;

create table produtos(

ID int(11) not null auto_increment primary key,
Name varchar(32) not null ,
Price decimal(9,2) not null,
Description varchar(120),
Count_P int(11),
Min_Count int(11),
insertData not null datetime,
dataModified not null datetime
ProviderID int(8) NOT NULL,
Code_produt nvarchar(16) NOT NULL
);

create table Providers(
ID int(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
Name NVARCHAR(50) NOT NULL,
company NVARCHAR(50) NOT NULL,
Office NVARCHAR(50) NOT NULL,
Location NVARCHAR(50) NOT NULL,
City NVARCHAR(50) NOT NULL,
Region NVARCHAR(50) NOT NULL,
CEP nvarchar(9) NOT NULL,
Country NVARCHAR(50) NOT NULL,
Phone NVARCHAR(18) NOT NULL,
Email NVARCHAR(50) NOT NULL

);

create table user_control(

ID int(11) not null auto_increment primary key,

UserName varchar(16) not null,
Password char(32) not null,
UserType int(3)
);

INSERT INTO user_control (`UserName`, `Password`, `UserType`) values ("admincontrol", "E10ADC3949BA59ABBE56E057F20F883E", 1)




/* SCHEMA TO SQL SERVER 2014*/



USE [Stock_Control]
GO
/****** Object:  Table [dbo].[produtos]    Script Date: 12/10/2016 10:22:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[produtos]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[produtos](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[Name] [nvarchar](16) NOT NULL,
	[Price] [decimal](9, 2) NOT NULL,
	[Description] [nvarchar](max) NOT NULL,
	[Count_P] [int] NOT NULL,
	[Min_Count] [int] NOT NULL,
	[insertData] [datetime] NOT NULL,
	[dataModified] [datetime] NOT NULL,
	[ProviderID] [int] NOT NULL,
	[Code_Produt] [nvarchar](16) NOT NULL,

 CONSTRAINT [PK_produtos] PRIMARY KEY CLUSTERED
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
ALTER TABLE [dbo].[produtos] SET (LOCK_ESCALATION = AUTO)
GO
/****** Object:  Table [dbo].[Providers]    Script Date: 12/10/2016 10:22:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Providers]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[Providers](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[Name] [nvarchar](50) NOT NULL,
	[company] [nvarchar](50) NOT NULL,
	[Office] [nvarchar](50) NOT NULL,
	[Location] [nvarchar](50) NOT NULL,
	[City] [nvarchar](50) NOT NULL,
	[Region] [nvarchar](50) NOT NULL,
	[CEP] [char](8) NOT NULL,
	[Country] [nvarchar](50) NOT NULL,
	[Phone] [nvarchar](18) NOT NULL,
	[Email] [nvarchar](50) NOT NULL,
 CONSTRAINT [PK_Providers] PRIMARY KEY CLUSTERED
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
ALTER TABLE [dbo].[Providers] SET (LOCK_ESCALATION = AUTO)
GO
/****** Object:  Table [dbo].[user_control]    Script Date: 12/10/2016 10:22:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[user_control]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[user_control](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[UserName] [nvarchar](16) NOT NULL,
	[Password] [char](32) NOT NULL,
	[UserType] [tinyint] NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
ALTER TABLE [dbo].[user_control] SET (LOCK_ESCALATION = AUTO)
GO
SET IDENTITY_INSERT [dbo].[user_control] OFF

INSERT [dbo].[user_control] ([UserName], [Password], [UserType]) VALUES ( N'admincontrol', N'E10ADC3949BA59ABBE56E057F20F883E', 1)
SET IDENTITY_INSERT [dbo].[user_control] OFF
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[DF_Providers_Phone]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[Providers] ADD  CONSTRAINT [DF_Providers_Phone]  DEFAULT ((0)) FOR [Phone]
END

GO
IF NOT EXISTS (SELECT * FROM ::fn_listextendedproperty(N'MS_Description' , N'SCHEMA',N'dbo', N'TABLE',N'produtos', NULL,NULL))
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Tabela Aonde Fica Registrado Os Produtos' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'produtos'
GO
IF NOT EXISTS (SELECT * FROM ::fn_listextendedproperty(N'MS_Description' , N'SCHEMA',N'dbo', N'TABLE',N'Providers', NULL,NULL))
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Tabela De Cadastro Dos Fornecedores' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'Providers'
GO
IF NOT EXISTS (SELECT * FROM ::fn_listextendedproperty(N'MS_Description' , N'SCHEMA',N'dbo', N'TABLE',N'user_control', NULL,NULL))
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Tabela De Usuários ' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'user_control'
GO
