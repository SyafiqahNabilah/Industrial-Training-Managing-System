const express = require('express');
var router = express.Router();

// const mongoose = require('mongoose');
// const Employee = mongoose.model('employee')



//router untuk memaparkan form yang telah dibuat di folder view
router.get('/',(req,res)=>{
    res.render("layouts/index");
   
});

module.exports = router;