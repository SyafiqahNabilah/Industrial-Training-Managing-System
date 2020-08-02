const express = require('express');
var router = express.Router();

// const mongoose = require('mongoose');
// const Employee = mongoose.model('employee')



//router untuk memaparkan form yang telah dibuat di folder view
router.get('/',(req,res)=>{
    res.render("employee/addOrEdit",{
        viewTitle: "Add Employee data"
    })
});

//router untuk paparkan data yang diambil dalam form kepada bentuk json.Contoh : { name: 'mariam@mariam', email: 'syafiqah@mariam' }
router.post('/',(req,res)=>{
    insertRecord(req,res);
});