import express from "express";
import dotenv from "dotenv";
dotenv.config();
process.env.MONGO_URI;
import cors from "cors";

import foodRouter from "./router/food.router";
import orderRouter from "./router/order.router";
import userRouter from "./router/user.router";
import { dbConnect } from "./configs/database.config";
dbConnect();
const app = express();

app.use("/api/foods", foodRouter);
app.use("/api/users", userRouter);
app.use("/api/orders", orderRouter);
app.use(express.json());
//localhost:4200 angular
//localhost:5000 expess

app.use(
  cors({
    credentials: true,
    origin: ["http://localhost:4200"],
  })
);

const port = 5000;

app.listen(port, () => {
  console.log("Website served on http://localhost:" + port);
});

