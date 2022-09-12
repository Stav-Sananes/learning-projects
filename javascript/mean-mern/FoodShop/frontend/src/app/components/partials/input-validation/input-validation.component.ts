import { Component, OnInit, Input,OnChanges, SimpleChanges } from "@angular/core";
import { AbstractControl } from "@angular/forms";
const VALDIATORS_MESSAGEES: any = {
  required: "Should not be empty",
  email: "Email is not valid",
  minLength:'Field is to short ',
  notMatch:'Password and confirm does not match at all!'
};
@Component({
  selector: "input-validation",
  templateUrl: "./input-validation.component.html",
  styleUrls: ["./input-validation.component.css"],
})
export class InputValidationComponent implements OnInit,OnChanges {
  @Input() control!: AbstractControl;
  @Input()
  showErrorsWhen: Boolean = true;
  errorMessage: string[] = [];
  constructor() {}

  ngOnInit(): void {
    this.control.statusChanges.subscribe(()=>{
      this.checkValidation()
    })
    this.control.valueChanges.subscribe(()=>{
      this.checkValidation()
    })
  }

  checkValidation() {
    const errors = this.control.errors;
    if (!errors) {
      this.errorMessage = [];
      return;
    }
    const errorKeys = Object.keys(errors);
    this.errorMessage = errorKeys.map((key) => VALDIATORS_MESSAGEES[key]);
  }
  ngOnChanges(changes: SimpleChanges): void {
    this.checkValidation()
  }
}
