import Hotel from "../models/Hotel";
import Room from "../models/Room";

export const createHotel = async (req, res, next) => {
  const newHotel = new Hotel(req.body);

  try {
    const saveHotelInfo = await newHotel.save();
    res.status(200).json(saveHotelInfo);
  } catch (error) {
    next(error);
  }
};

export const UpdateHotel = async (req, res, next) => {
  try {
    const updateHotelInfo = await Hotel.findByIdAndUpdate(req.params.id, {
      $set: req.body,
    });
    res.status(200).json(updateHotelInfo);
  } catch (error) {
    next(error);
  }
};

export const DeleteHotel = async (req, res, next) => {
  try {
    await Hotel.findByIdAndDelete(req.params.id);
    res.status(200).json("Hotel has been deleted");
  } catch (error) {
    next(error);
  }
};

export const getHotel = async (req, res, next) => {
  try {
    const findHotel = await Hotel.findById(req.params.id);
    res.status(200).json(findHotel);
  } catch (error) {
    next(error);
  }
};
export const getAllHotels = async (req, res, next) => {
  const { min, max, ...others } = req.query;
  try {
    const findAllHotel = await Hotel.find({
      ...others,
      cheapestPrice: { $gt: min | 1, $lt: max || 999 },
    }).limit(req.query.limit);
    res.status(200).json(findAllHotel);
  } catch (error) {
    next(error);
  }
};
export const countByCity = async (req, res, next) => {
  const cities = req.query.cities.split(",");
  try {
    const list = await Promise.all(
      cities.map((city) => {
        return Hotel.countDocuments({ city: city });
      })
    );
    res.status(200).json(list);
  } catch (error) {
    next(error);
  }
};
export const countByType = async (req, res, next) => {
  try {
    const hotelCount = await hotel.countDocuments({ type: "hotel" });
    const apartmentCount = hotel.countDocuments({ type: "apartment" });
    const resortCount = hotel.countDocuments({ type: "resort" });
    const villaCount = hotel.countDocuments({ type: "villa" });
    const cabinCount = hotel.countDocuments({ type: "cabin" });

    res.status(200).json([
      { type: "hotel", count: hotelCount },
      { type: "apartment", count: apartmentCount },
      { type: "resort", count: resortCount },
      { type: "villa", count: villaCount },
      { type: "cabin", count: cabinCount },
    ]);
  } catch (error) {
    next(error);
  }
};

export const getHotelRooms = async (req,res,next)=>{
  try {
    const hotel = await Hotel.findById(req.params.id)
    const list = await Promise.all(hotel.rooms.map,(room)=>{
      return Room.findById(room)
    })
    res.status(200).json(list)
  } catch (error) {
    next(error)
  }
}