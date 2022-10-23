import {
  Component,
  OnInit,
  EventEmitter,
  Output,
  OnDestroy,
} from "@angular/core";
import { Subscription } from "rxjs";
import { StoreService } from "src/app/services/store.service";

@Component({
  selector: "app-filters",
  templateUrl: "filters.component.html",
})
export class FiltersComponent implements OnInit, OnDestroy {
  @Output() showCatrgory = new EventEmitter<string>();
  categories: Array<string> | undefined;
  categoriesSub: Subscription | undefined;
  constructor(private storeService: StoreService) {}

  ngOnInit(): void {
    this.storeService.getAllCategories().subscribe((response) => {
      this.categories = response;
    });
  }
  onShowCategory(category: string): void {
    this.showCatrgory.emit(category);
  }
  ngOnDestroy(): void {
    if (this.categoriesSub) {
      this.categoriesSub.unsubscribe();
    }
  }
}
