import {
  mdiAccountCircle,
  mdiCog,
  mdiFileDocument,
} from "@mdi/js";

export default [
  
  {
    href: route('accounts.index'),
    label: "Accounts",
    icon: mdiAccountCircle,
  },
  {
    href: route('commissions.index'),
    label: "Commissions",
    icon: mdiFileDocument,
  },
  {
    href: route('calculation.index'),
    label: "Calculation",
    icon: mdiCog,
  },
];
