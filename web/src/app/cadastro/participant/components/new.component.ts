import { Component, OnInit } from '@angular/core';
import * as jQuery from 'jquery';

import { Router, ActivatedRoute } from '@angular/router';
import { NgForOf } from '@angular/common';
import { ParticipantsService } from '../services/participants.service';
import { FormsModule } from '@angular/forms';
import {AppMessageService} from "../../../app-message.service";

@Component({
    templateUrl: 'new.component.html'
})
export class NewComponent implements OnInit {

    constructor(private httpService: ParticipantsService, private router: Router, private route: ActivatedRoute
        , private notification: AppMessageService
    ) {}

    participant = {
        name:null,
        age:0,
        genre:null,
        email:null
    };

    ngOnInit(): void {
       this.showLoading();
        jQuery('#infoModal').show().addClass('show');
        setTimeout(() => {
            this.hideLoading();
        },300);

    }

    save(e)
    {
        if(this.participant.name == '' || this.participant.age == 0 || this.participant.email == null)
        {
            this.notification.message('Erro', 'Campo nome, email, idade e sexo são obrigatórios','error');
        }else{

        this.showLoading();
        this.httpService.setAccessToken();
                this.httpService.builder('admin/')
                    .insert(e, 'participant')
                    .then(() => {
                        this.httpService.eventEmitter.emit();
                        this.hideLoading();
                        this.notification.message('Sucesso', 'Participante salvo com sucesso', 'success');
                        this.close();
                    });

        }
    }
    close(){
        jQuery('#infoModal').hide();
        this.router.navigate(['/cadastro/participant']);
    }

    hideLoading(){
        jQuery("#bifrostBarSpinner").hide();
    }

    showLoading(){
        jQuery("#bifrostBarSpinner").show();
    }
}
