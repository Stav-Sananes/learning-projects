import { prepareEventListenerParameters } from "@angular/compiler/src/render3/view/template";
import { Component, OnInit } from "@angular/core";
import { ActivatedRoute } from "@angular/router";
import { Observable } from "rxjs";
import { FoodService } from "src/app/services/food.service";
import { Food } from "src/app/shared/models/Food";

@Component({
  selector: "app-home",
  templateUrl: "./home.component.html",
  styleUrls: ["./home.component.css"],
})
export class HomeComponent implements OnInit {
  foods: Food[] = [];
  constructor(private foodService: FoodService, activated: ActivatedRoute) {
    let foodsObservable: Observable<Food[]>;
    activated.params.subscribe((params) => {
      if (params.Search)
        foodsObservable = this.foodService.getAllFoodsBySearchTerm(
          params.Search
        );
      else if (params.tag)
        foodsObservable = this.foodService.getAllFoodsByTag(params.tag);
      else foodsObservable = foodService.getAll();
    });
    foodsObservable = foodService.getAll();
  }
  ngOnInit(): void {}
}
