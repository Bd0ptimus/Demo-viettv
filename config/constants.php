<?php

//ROLE users
const ROLE_USER = 1;
const ROLE_ADMIN = 2;
const ROLE_SUPER_ADMIN = 3;



//Page id
const ADMIN_PAGE = 1;
const CREATE_ACC_CONFIRMATION_PAGE=2;


//STATUS ACCOUNT
const PAYED=2;
const WAITING_PAY=3;
const CANCELED =4;
const TRIAL=5;
const GIFTED=6;
const USER_ACTIVATED=1;
const USER_SUSPENDED=0;
const USER_EXPIRED = 7;

const STATUSs=[USER_SUSPENDED,USER_ACTIVATED,PAYED,WAITING_PAY,CANCELED,TRIAL,GIFTED,USER_EXPIRED];


//Third party serivce
const ADMIN_USER=-1;
const VIETTV_USER=0;
const VNOO_USER=1;
const GOVIET_USER=2;
const M3U_USER=3;

const USERTYPE_DEFINED = [
    'Viet-tv', 'Vnoo', 'Go viet', 'M3u',
];

const REGISTER_REQUEST_EMAIL_TO=[
    'nvt.702@gmail.com',
    'mhieu181201@gmail.com',
    'quocvotb@gmail.com',
];

//Currency
const VND =  1;
const USD = 2;
const EURO = 3;


//Paid confirm
const PAID_CONFIRM=1;
const PAID_NOT_CONFIRM=0;

//box assign
const BOX_ASSIGNED=1;
const BOX_NOT_ASSIGNED=0;

//Account Tabs
const ADMIN_TAB =1;
const VIETTV_TAB = 2;
const VNOO_TAB = 3;
const GOVIET_TAB=4;
const M3U_TAB = 5;
