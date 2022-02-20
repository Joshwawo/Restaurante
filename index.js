const express = require('express');
const morgan = require('morgan');
const exphbs = require('express-handlebars');
const path = require('path');
//initialization

const app = express();

// Settings
app.set('port', process.env.PORT || 4000);
app.set('views', path.join(__dirname, 'src/Vista'));

app.engine('.hbs', exphbs.engine({
    defaultLayout: 'main',
    layoutsDir: path.join(app.get('views'), 'layouts'),
    partialsDir: path.join(app.get('views'), 'partials'),
    extname: '.hbs',
    helpers: require('./src/Modelo/lib/handlebars')
}))

app.set('view engine', '.hbs');


//MIDDLEWARES
app.use(morgan('dev'));
app.use(express.urlencoded({extended:false}));
app.use(express.json());

//VARIABLES GLOBALES
app.use((req, res, next) =>{
    next();
});


//RUTAS
app.use(require('./src/Modelo/Routes/Routes.js'));



//Archivos Publicos


//Iniciar el servidor
app.listen(app.get('port'), () => {
    console.log('Server on port', app.get('port'));
});

