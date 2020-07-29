require('./models/db');

const express = require('express');
const path = require('path');
const exphbs = require('express-handlebars');
const Handlebars = require('handlebars')
const {allowInsecurePrototypeAccess} = require('@handlebars/allow-prototype-access')
//parse data from form
const bodyparser = require('body-parser');


const mainController = require('./controllers/mainController');



var app = express();
app.set('views', path.join(__dirname,'/views/'));
app.use(express.static('assets/'));
// app.use(express.static('assets/'));


app.engine('hbs', exphbs({
    extname: 'hbs', 
    defaultLayout: 'mainLayout', 
    layoutsDir:__dirname+'/views/layouts/',
    handlebars: allowInsecurePrototypeAccess(Handlebars)
}));

app.set('view engine','hbs');
app.listen(3000, () => {
    console.log('Express server started at port =3000');
});

app.use('/',mainController);

//handlebars  access denied https://github.com/handlebars-lang/handlebars.js/issues/1648
//start server using mongod