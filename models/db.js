const mongoose = require('mongoose');

mongoose.connect('mongodb://localhost:27017/Industrial-Training-Managing-System',{ 
    useNewUrlParser:true,
    useUnifiedTopology: true
}, (err) =>{
    if(!err){
        console.log('MongoDB connection succeed');
    }
    else{
        console.log('Error in DB connection :'+err);
    }
});

// require('./student.model');
