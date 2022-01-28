// const express = require('express');
const path      = require('path');
const multer    = require('multer');
const  {body, check, validationResult} = require('express-validator');


// const app = express();
// app.use()



const diskStorage = multer.diskStorage({
    destination: (req, res, cb) => {
        cb(null, path.join(__dirname, '/public/assets/img'));
    },
    // filename: (req, file, cb) => {
    //     cb(null, `${file.fieldname} - ${Date.now() + path.extname(file.originalname)}`);
    // }
});


// const isImage = () => {

// }


const middleware = {
    isUpload: (req, res, next) => {
        if(typeof req.file == 'undefined') {
            console.log('no image upload');
            next();
        } else {
            const upload = multer({storage: console.log(diskStorage.filename)}).single('image');
            if(!upload) {
                console.log('false');
            }
            next();
        }
    },
    isValidatorData: (req, res, next) => {
        [
                body('name', 'Field Full Name is required').exists({checkFalsy: true}),
                check('email', 'Email must be valid email').isEmail(),
                body('phone', 'Field Phone is Required & must be ID format').isMobilePhone('id-ID'),
                check('image', 'an image must be right image').custom((value, {req}) => {
                        if(typeof req.file != 'undefined' ) {
                            const extension = (path.extname(req.file.originalname)).toLowerCase();
                            switch (extension) {
                                case '.jpg':
                                    return true;
                                case '.jpeg':
                                    return true;
                                case  '.png':
                                    return true;
                                case  '.JPEG':
                                    return true;
                                case  '.JPG':
                                    return true;
                                case  '.PNG':
                                    return true;
                                default:
                                    fs.unlink(req.file.path, (err) => {
                                        if(err) {
                                            console.log(err);
                                        }
                                        console.log('image successfully deleted');
                                    });
                                    return false;
                            }
                        }
                        return true;
                })
            ];
            next();
    }
}


// module.exports = {isUpload}
module.exports = {middleware}