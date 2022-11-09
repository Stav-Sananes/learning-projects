import express from "express";
import { createUser, DeleteUser, getAllUsers, getUser, UpdateUser } from "../controllers/userController";
import { verifyAdmin, verifyToken, verifyUser } from "../utils/verifyToken";

const router = express.Router();
router.get("/checkauth",verifyToken,(req,res,next)=>{
    res.send("Hello user,You are authenticated");
})
router.get("/checkuser/:id",verifyUser,(req,res,next)=>{
    res.send("Hello user,You are authenticated and you can delete your account");
})
router.get("/checkadmin/:id",verifyAdmin,(req,res,next)=>{
    res.send("Hello admin,You are authenticated and you can delete your account");
})
router.post("/", createUser);

router.put("/:id",verifyUser, UpdateUser);
router.delete("/:id",verifyUser, DeleteUser);
router.get("/:id", verifyUser,getUser);
router.get("/", verifyAdmin,getAllUsers);
export default router;
