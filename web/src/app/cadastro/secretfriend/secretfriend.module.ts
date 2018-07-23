import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { ChartsModule } from 'ng2-charts/ng2-charts';
import { BsDropdownModule } from 'ngx-bootstrap/dropdown';

import { SecretfriendComponent } from './components/secretfriend.component';
import { NewComponent } from './components/new.component';
import { EditComponent} from "./components/edit.component";
import { SecretfriendRoutingModule } from './secretfriend-routing.module';


import { SecretfriendService } from './services/secretfriend.service';

import { CurrencyMaskModule } from "ng2-currency-mask";


@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    SecretfriendRoutingModule,
    ChartsModule,
    BsDropdownModule,
    CurrencyMaskModule
  ],
  declarations: [ SecretfriendComponent, NewComponent, EditComponent ],
  providers: [ SecretfriendService ]
})
export class SecretfriendModule { }

