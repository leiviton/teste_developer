import { Component, OnInit } from '@angular/core';
import * as jQuery from 'jquery';

import { Router, ActivatedRoute } from '@angular/router';
import { NgForOf } from '@angular/common';
import { SecretfriendService } from '../services/secretfriend.service';
import { FormsModule } from '@angular/forms';
import {AppMessageService} from "../../../app-message.service";

@Component({
    templateUrl: 'new.component.html'
})
export class NewComponent implements OnInit {

    constructor(private httpService: SecretfriendService, private router: Router, private route: ActivatedRoute
        , private notification: AppMessageService
    ) {}

    secritfriend = {
        title:null,
        minimum_value:null,
        realization_date:null,
        participants: this.httpService.get().participants,
    };

    result = {};
    ngOnInit(): void {
       this.showLoading();
       let cart = this.httpService.get();
       if(!cart)
       {
           this.httpService.initCart();
       }
        jQuery('#new_secret_friend').show().addClass('show');
        setTimeout(() => {
            this.hideLoading();
        },300);
        jQuery('#participant').hide();
    }

    save(e)
    {
                this.showLoading();
                this.httpService.setAccessToken();
                this.httpService.builder('admin/')
                    .insert(e, 'secret/friend')
                    .then(() => {
                        this.httpService.eventEmitter.emit();
                        this.hideLoading();
                        this.notification.message('Sucesso', 'Amigo secreto salvo com sucesso', 'success');
                        this.close();
                    });
    }

    showParticipant()
    {
        jQuery('#participant').show().addClass('show').css('z-index',1050 + 60);
        jQuery('#new_secret_friend').css('z-index', 1040);
        this.httpService.builder('admin/')
            .list({},'participant')
            .then((res) => {
                this.result = res;
            });
    }


    addParticipant(item)
    {
        this.httpService.addItem(item);
        this.secritfriend.participants = this.httpService.get().participants;
        this.closeParticipant();
        this.notification.message('Sucesso', 'Participant '+item.name+' adicionado.','success');
    }


    closeParticipant()
    {
        jQuery('#participant').hide();
    }

    close(){
        jQuery('#infoModal').hide();
        this.router.navigate(['/cadastro/secretfriend']);
    }

    hideLoading(){
        jQuery("#bifrostBarSpinner").hide();
    }

    showLoading(){
        jQuery("#bifrostBarSpinner").show();
    }
}
