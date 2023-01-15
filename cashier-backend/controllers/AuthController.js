import user from '../models/User.js';
import bcrypt from 'bcrypt';
import env from 'dotenv';
import jwt from 'jsonwebtoken';

const generateJwtToken = async (payload) => {
    return jwt.sign(
        payload,
        process.env.JWT_SECRET,
        { expiresIn: process.env.JWT_EXPIRE }
    );
}

const generateRefreshJwtToken = async (payload) => {
    return jwt.sign(
        payload,
        process.env.JWT_REFRESH_SECRET,
        { expiresIn: process.env.JWT_EXPIRE }
    );
}

const login = async (req, res) => {
    
        try {
            if(!req.body.email) throw { code: 428, message: 'Email is required' };
            if(!req.body.password) throw { code: 428, message: 'Password is required' };
    
            const User = await user.findOne({email: req.body.email});
            if(!User) throw { code: 404, message: 'EMAIL_NOT_REGISTERED' };

            const validPass = await bcrypt.compare(req.body.password, User.password);
            if(!validPass) throw { code: 401, message: 'PASSWORD_NOT_MATCH' };

            const token = await generateJwtToken({
                id: User._id,
                role: User.role
            });

            const refreshToken = await generateRefreshJwtToken({
                id: User._id,
                role: User.role
            });

        
            res.status(200).json({
                status: 'success',
                message: 'USER_LOGIN_SUCCESS',
                token: token,
                refreshToken: refreshToken,
            });
        } catch (error) {
    console.log(typeof env.JWT_EXPIRE);

            if(!error.code) error.code = 500;
            res.status(error.code).json({
                status: 'error',
                message: error.message
            });
        }

}

const refreshToken = async (req, res) => {
    try {
        if(!req.body.refresh_token) throw { code: 428, message: 'Refresh token is required' };

        const verifyToken = jwt.verify(req.body.refresh_token, process.env.JWT_REFRESH_SECRET);
        console.info(verifyToken);
        if(!verifyToken) throw { code: 401, message: 'INVALID_REFRESH_TOKEN' };

        const User = await user.findById(verifyToken.id);
        if(!User) throw { code: 404, message: 'USER_NOT_FOUND' };

        const token = await generateJwtToken({
            id: User._id,
            role: User.role
        });

        const refreshToken = await generateRefreshJwtToken({
            id: User._id,
            role: User.role
        });

        return res.status(200).json({
            status: true,
            message: 'REFRESH_TOKEN_SUCCESS',
            accessToken: token,
            refreshToken: refreshToken
        });

    } catch (error) {
        if(!error.code) error.code = 500;
        res.status(error.code).json({
            status: 'error',
            message: error.message
        });
    }

}
            
            
        

const register = async (req, res) => {

    try {
        if(!req.body.fullname) throw { code: 428, message: 'Full name is required' };
        if(!req.body.email) throw { code: 428, message: 'Email is required' };
        if(!req.body.password) throw { code: 428, message: 'Password is required' };
        // password match
        if(req.body.password !== req.body.confirm_password) throw { code: 428, message: 'PASSWORD_NOT_MATCH' };
        // email exist
        const emailExist = await user.findOne({email : req.body.email});
        if(emailExist) throw { code: 428, message: 'EMAIL_EXIST' };

        // hash password
        const salt = await bcrypt.genSalt(10);
        const hashPassword = await bcrypt.hash(req.body.password, salt);




        const newUser = new user({
            fullname: req.body.fullname,
            email: req.body.email,
            password: hashPassword,
            role: req.body.role,
        });

        const User = await newUser.save();

        if(!User) {
            throw { code: 500, message: 'USER_REGISTER_FAILED' };
        }

        res.status(200).json({
            status: 'success',
            message: 'USER_REGISTER_SUCCESS',
            User 
        });
    } catch (error) {
        if(!error.code) error.code = 500;
        res.status(error.code).json({
            status: 'error',
            message: error.message
        });
    }


}

export { register, login, refreshToken }
