
import User from "../models/user.js";
export const createUser = async (req, res, next) => {
    const newUser = new User(req.body);
  
    try {
      const saveUserInfo = await newUser.save();
      res.status(200).json(saveUserInfo);
    } catch (error) {
      next(error);
    }
  };
  
  export const UpdateUser = async (req, res, next) => {
    try {
      const updateUserInfo = await User.findByIdAndUpdate(req.params.id, {
        $set: req.body,
      });
      res.status(200).json(updateUserInfo);
    } catch (error) {
      next(error);
    }
  };
  
  export const DeleteUser = async (req, res, next) => {
    try {
      await User.findByIdAndDelete(req.params.id);
      res.status(200).json("User has been deleted");
    } catch (error) {
      next(error);
    }
  };
  
  export const getUser = async (req, res, next) => {
    try {
      const findUser = await User.findById(req.params.id);
      res.status(200).json(findUser);
    } catch (error) {
      next(error);
    }
  };
  export const getAllUsers = async (req, res, next) => {
    try {
      const findAllUser = await User.find();
      res.status(200).json(findAllUser);
    } catch (error) {
      next(error);
    }
  };
  