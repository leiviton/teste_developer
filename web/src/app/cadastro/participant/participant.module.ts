import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { ChartsModule } from 'ng2-charts/ng2-charts';
import { BsDropdownModule } from 'ngx-bootstrap/dropdown';

import { ParticipantComponent } from './components/participant.component';
import { NewComponent } from './components/new.component';
import { EditComponent} from "./components/edit.component";
import { ParticipantRoutingModule } from './participant-routing.module';


import { ParticipantsService } from './services/participants.service';

import { CurrencyMaskModule } from "ng2-currency-mask";


@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    ParticipantRoutingModule,
    ChartsModule,
    BsDropdownModule,
    CurrencyMaskModule
  ],
  declarations: [ ParticipantComponent, NewComponent, EditComponent ],
  providers: [ ParticipantsService ]
})
export class ParticipantModule { }

